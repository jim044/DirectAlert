package directalert.com.directalert.DAL;

import android.os.AsyncTask;
import android.util.Log;

import com.google.gson.Gson;
import com.squareup.okhttp.FormEncodingBuilder;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

/**
 * Created by user on 24/01/2017.
 */

public class InsertPosition extends AsyncTask<Object, String, Response> {

    private static final String TAG = "InsertPosition";
    private static final String REGISTER_URL = "http://jim044.000webhostapp.com/insertPositionUser.php";
    private static final String KEY_POSITION = "position";
    private static final String KEY_TOKEN = "gcm_token";
    private static final String KEY_USER = "user";

    @Override
    protected Response doInBackground(Object... params) {

        Gson gson = new Gson();
        String jsonToken = gson.toJson(params[0]);
        String jsonUser = gson.toJson(params[1]);
        String jsonPosition = gson.toJson(params[2]);
        RequestBody requestBody = new FormEncodingBuilder()
                .add(KEY_TOKEN, jsonToken)
                .add(KEY_USER, jsonUser)
                .add(KEY_POSITION, jsonPosition)
                .build();

        Request request = new Request.Builder()
                .url(REGISTER_URL)
                .post(requestBody)
                .build();

        return null;
    }

    protected void onProgressUpdate(Integer... progress) {

    }

    protected void onPostExecute(Response result) {
        Log.i(TAG, result.message());
    }
}
