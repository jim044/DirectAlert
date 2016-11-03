package directalert.com.directalert.BLL;

import android.app.IntentService;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;
import android.support.v4.content.LocalBroadcastManager;
import android.util.Log;
import android.widget.Toast;

import com.google.android.gms.gcm.GoogleCloudMessaging;
import com.google.android.gms.iid.InstanceID;
import com.squareup.okhttp.FormEncodingBuilder;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import java.io.IOException;
import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.util.LinkedHashMap;
import java.util.Map;

import directalert.com.directalert.R;

//import directalert.com.directalert.R;

/**
 * Created by user on 03/11/2016.
 */

public class RegistrationIntentService extends IntentService {

    private static final String TAG = "RegIntentService";

    private static final String REGISTER_URL = "http://jim044.000webhostapp.com/register.php";

    private static final String KEY_TOKEN = "gcm_token";

    public RegistrationIntentService() {
        super(TAG);
    }

    @Override
    protected void onHandleIntent(Intent intent) {
        SharedPreferences sharedPreferences = PreferenceManager.getDefaultSharedPreferences(this);
        sharedPreferences.edit().clear().commit();

        try {
            // In the (unlikely) event that multiple refresh operations occur simultaneously,
            // ensure that they are processed sequentially.
            synchronized (TAG) {
                // [START register_for_gcm]
                // Initially this call goes out to the network to retrieve the token, subsequent calls
                // are local.
                InstanceID instanceID = InstanceID.getInstance(this);

                String token = instanceID.getToken(getString(R.string.gcm_defaultSenderId),
                        GoogleCloudMessaging.INSTANCE_ID_SCOPE, null);

                Log.i(TAG, "GCM Registration Token: " + token);

                // Si le token a déjà été engistre pas la peine de le renvoyer
                if (!sharedPreferences.getBoolean(QuickstartPreferences.SENT_TOKEN_TO_SERVER, false))
                    sendRegistrationToServer(token);

                // You should store a boolean that indicates whether the generated token has been
                // sent to your server. If the boolean is false, send the token to your server,
                // otherwise your server should have already received the token.
                sharedPreferences.edit().putBoolean(QuickstartPreferences.SENT_TOKEN_TO_SERVER, true).apply();
            }
        } catch (Exception e) {
            Log.d(TAG, "Failed to complete token refresh", e);
            // If an exception happens while fetching the new token or updating our registration data
            // on a third-party server, this ensures that we'll attempt the update at a later time.
            sharedPreferences.edit().putBoolean(QuickstartPreferences.SENT_TOKEN_TO_SERVER, false).apply();
        }
        // Notify UI that registration has completed, so the progress indicator can be hidden.
        Intent registrationComplete = new Intent(QuickstartPreferences.REGISTRATION_COMPLETE);
        LocalBroadcastManager.getInstance(this).sendBroadcast(registrationComplete);
    }

    /**
     *  Ici nous allons envoyer le token de l'utilisateur au serveur
     *
     * @param token Le token
     */
    private void sendRegistrationToServer(String token) throws IOException {

        OkHttpClient client = new OkHttpClient();

        //RequestBody requestBody = new FormEncodingBuilder()
        //        .add(KEY_TOKEN, token)
        //        .build();

        //Request request = new Request.Builder()
        //        .url(REGISTER_URL)
        //        .post(requestBody)
        //        .build();


        try {
            URL myurl=new URL(REGISTER_URL);
            Map<String,Object> params = new LinkedHashMap<>();
            params.put("gcm_token", token);
            StringBuilder postData = new StringBuilder();
            for (Map.Entry<String,Object> param : params.entrySet()) {
                if (postData.length() != 0) postData.append('&');
                postData.append(URLEncoder.encode(param.getKey(), "UTF-8"));
                postData.append('=');
                postData.append(URLEncoder.encode(String.valueOf(param.getValue()), "UTF-8"));
            }
            byte[] postDataBytes = postData.toString().getBytes("UTF-8");

            HttpURLConnection conn = (HttpURLConnection)myurl.openConnection();
            conn.setRequestMethod("POST");
            conn.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
            conn.setRequestProperty("Content-Length", String.valueOf(postDataBytes.length));
            conn.setDoOutput(true);
            conn.getOutputStream().write(postDataBytes);


            //Response response = client.newCall(request).execute();
            //Context context = getApplicationContext();
            //int duration = Toast.LENGTH_LONG;

            //Toast toast = Toast.makeText(context, response.message(), duration);
            //toast.show();

        } catch (IOException e) {
            e.printStackTrace();
        }

    }
}
