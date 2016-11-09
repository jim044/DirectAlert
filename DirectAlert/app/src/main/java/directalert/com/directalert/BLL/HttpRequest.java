package directalert.com.directalert.BLL;

import android.os.AsyncTask;
import android.util.Log;

import com.google.gson.Gson;
import com.squareup.okhttp.FormEncodingBuilder;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

/**
 * Created by user on 04/11/2016.
 */

public class HttpRequest extends AsyncTask<Object, String, Response>{

    private static final String TAG = "FirebaseIDService";
    private static final String REGISTER_URL = "http://jim044.000webhostapp.com/register.php";

    private static final String KEY_TOKEN = "gcm_token";
    private static final String KEY_USER = "user";
    private static final String KEY_EVENT = "event";


    OkHttpClient client = new OkHttpClient();

    @Override
    protected Response doInBackground(Object... params) {
        Response response = null;

        Gson gson = new Gson();
        String jsonListCalendar = gson.toJson(params[0]);
        String jsonToken = gson.toJson(params[1]);
        String jsonUser = gson.toJson(params[2]);
        RequestBody requestBody = new FormEncodingBuilder()
                .add(KEY_TOKEN, jsonToken)
                .add(KEY_USER, jsonUser)
                .add(KEY_EVENT, jsonListCalendar)
                .build();

        //
        //

        Request request = new Request.Builder()
                .url(REGISTER_URL)
                .post(requestBody)
                .build();

        try {
            response = client.newCall(request).execute();

            String jsonData = response.body().string();

            // Transform reponse to JSon Object
            JSONObject jsontest = new JSONObject(jsonData);

            // Use the JSon Object
            Log.d("json", jsontest.getString("message"));

        } catch (IOException e) {
            e.printStackTrace();
        } catch (JSONException e) {
            e.printStackTrace();
        }

        return response;
    }

    protected void onProgressUpdate(Integer... progress) {

    }

    protected void onPostExecute(Response result) {

        Log.i(TAG, result.message());

    }
}
