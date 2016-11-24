package directalert.com.directalert.BLL;

import android.icu.text.RelativeDateTimeFormatter;
import android.os.AsyncTask;
import android.util.Log;

import com.google.api.client.util.DateTime;
import com.google.gson.Gson;
import com.squareup.okhttp.FormEncodingBuilder;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

import directalert.com.directalert.BO.EventUser;
import directalert.com.directalert.BO.User;
import directalert.com.directalert.Home;
import directalert.com.directalert.ListEventUserActivity;

/**
 * Created by user on 23/11/2016.
 */

public class GetEvent extends AsyncTask<Object, String, Response> {

    private static final String REGISTER_URL = "http://jim044.000webhostapp.com/getEventForAndroid.php";
    private static final String KEY_USER = "user";
    private ListEventUser listEventUser = new ListEventUser();

    OkHttpClient client = new OkHttpClient();

    @Override
    protected Response doInBackground(Object... params) {
        Response response = null;

        Gson gson = new Gson();
        String jsonUser = gson.toJson(params[0]);
        RequestBody requestBody = new FormEncodingBuilder()
                .add(KEY_USER, jsonUser)
                .build();

        Request request = new Request.Builder()
                .url(REGISTER_URL)
                .post(requestBody)
                .build();

        try {
            response = client.newCall(request).execute();
        } catch (IOException e) {
            e.printStackTrace();
        }
        return response;
    }

    protected void onProgressUpdate(Integer... progress) {

    }

    protected void onPostExecute(Response result) {

        String jsonData = null;
        try {
            jsonData = result.body().string();
        } catch (IOException e) {
            e.printStackTrace();
        }

        //String decoupjsonData = jsonData.substring(1, jsonData.length()-1);

        JSONArray jsontest = null;
        try {
            jsontest = new JSONArray(jsonData);
        } catch (JSONException e) {
            e.printStackTrace();
        }

        SimpleDateFormat simpleDateFormat = new SimpleDateFormat("yyyy-dd-MM HH:mm:ss");

        for(int i = 0; i<jsontest.length(); i++)
            {
                try {
                    JSONObject jsonObject = jsontest.getJSONObject(i);

                    User user = new User(jsonObject.getString("id_user_mail"));

                    Date date = simpleDateFormat.parse(jsonObject.getString("date_event"));
                    DateTime start = new DateTime(date);

                    if(start == null) {
                        start = new DateTime(date);
                    }

                    listEventUser.add(new EventUser(jsonObject.getString("id_event_user"), start, jsonObject.getString("libelle"), jsonObject.getString("location"), user));
                } catch (JSONException e) {
                    e.printStackTrace();
                } catch (ParseException e) {
                    e.printStackTrace();
                }

            }

        ListEventUserActivity uneListe = new ListEventUserActivity();

        uneListe.lancerListe(listEventUser);


    }


}
