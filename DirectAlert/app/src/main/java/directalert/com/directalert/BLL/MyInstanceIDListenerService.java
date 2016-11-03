package directalert.com.directalert.BLL;

import android.content.Context;
import android.content.Intent;
import android.util.Log;
import android.widget.Toast;

import com.google.firebase.iid.FirebaseInstanceId;
import com.google.firebase.iid.FirebaseInstanceIdService;
import com.squareup.okhttp.FormEncodingBuilder;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import java.io.IOException;

/**
 * Created by user on 03/11/2016.
 */

public class MyInstanceIDListenerService extends FirebaseInstanceIdService {

    private static final String REGISTER_URL = "http://jim044.000webhostapp.com/register.php";
    private static final String KEY_TOKEN = "gcm_token";
    private static final String TAG = "MyInstanceIDLS";

    /**
     * Called if InstanceID token is updated. This may occur if the security of
     * the previous token had been compromised. This call is initiated by the
     * InstanceID provider.
     */
    @Override
    public void onTokenRefresh() {
        // Fetch updated Instance ID token and notify our app's server of any changes (if applicable).
        // Get updated InstanceID token.
        String refreshedToken = FirebaseInstanceId.getInstance().getToken();
        Log.d(TAG, "Refreshed token: " + refreshedToken);
        // TODO: Implement this method to send any registration to your app's servers.
        try {
            sendRegistrationToServer(refreshedToken);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }


    private void sendRegistrationToServer(String token) throws IOException {

        OkHttpClient client = new OkHttpClient();

        RequestBody requestBody = new FormEncodingBuilder()
                .add(KEY_TOKEN, token)
                .build();

        Request request = new Request.Builder()
                .url(REGISTER_URL)
                .post(requestBody)
                .build();


        try {
            Response response = client.newCall(request).execute();
            Context context = getApplicationContext();
            int duration = Toast.LENGTH_LONG;

            Toast toast = Toast.makeText(context, response.message(), duration);
            toast.show();

        } catch (IOException e) {
            e.printStackTrace();
        }

    }
}
