package directalert.com.directalert.DAL;

import android.os.AsyncTask;

import com.google.gson.Gson;
import com.squareup.okhttp.FormEncodingBuilder;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import java.io.IOException;

import directalert.com.directalert.BLL.ListEventUser;

/**
 * Created by user on 02/12/2016.
 */

public class Notify extends AsyncTask<Object, String, Response> {

    private static final String REGISTER_URL = "http://jim044.000webhostapp.com/notifierByUser.php";
    private static final String KEY_TOKEN = "token";

    OkHttpClient client = new OkHttpClient();

    @Override
    protected Response doInBackground(Object... params) {
        Response response = null;

        Gson gson = new Gson();
        String jsonToken = gson.toJson(params[0]);

        //jsonToken  = jsonToken.substring(1, jsonToken.length()-1);
        RequestBody requestBody = new FormEncodingBuilder()
                .add(KEY_TOKEN, jsonToken)
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

    protected void onPostExecute(String result) {
    }
}
