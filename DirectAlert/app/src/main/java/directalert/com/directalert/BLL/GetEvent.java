package directalert.com.directalert.BLL;

import android.os.AsyncTask;
import com.google.gson.Gson;
import com.squareup.okhttp.FormEncodingBuilder;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;
import java.io.IOException;

/**
 * Created by user on 23/11/2016.
 */

public class GetEvent extends AsyncTask<Object, String, String> {

    private static final String REGISTER_URL = "http://jim044.000webhostapp.com/getEventForAndroid.php";
    private static final String KEY_USER = "user";
    private ListEventUser listEventUser = new ListEventUser();

    OkHttpClient client = new OkHttpClient();

    @Override
    protected String doInBackground(Object... params) {
        String valueRetour = null;
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

        String jsonData = null;
        try {
            jsonData = response.body().string();
        } catch (IOException e) {
            e.printStackTrace();
        }

        return jsonData;
    }

    protected void onProgressUpdate(Integer... progress) {

    }

    protected void onPostExecute(String result) {
    }


}
