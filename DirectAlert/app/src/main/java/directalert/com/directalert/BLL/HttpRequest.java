package directalert.com.directalert.BLL;

import android.os.AsyncTask;
import android.util.Log;

import com.squareup.okhttp.FormEncodingBuilder;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import java.io.IOException;

/**
 * Created by user on 04/11/2016.
 */

public class HttpRequest extends AsyncTask<String, String, Response>{

    private static final String TAG = "FirebaseIDService";
    private static final String REGISTER_URL = "http://jim044.000webhostapp.com/register.php";
    private static final String KEY_TOKEN = "gcm_token";
    OkHttpClient client = new OkHttpClient();

    @Override
    protected Response doInBackground(String... params) {

        Response response = null;
        RequestBody requestBody = new FormEncodingBuilder()
                .add(KEY_TOKEN, params[0])
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

        Log.i(TAG, result.message());

    }
}
