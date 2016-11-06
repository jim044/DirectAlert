package directalert.com.directalert.BLL;

import android.util.Log;

import com.google.firebase.iid.FirebaseInstanceId;
import com.google.firebase.iid.FirebaseInstanceIdService;

import java.util.Date;
import java.util.List;

import directalert.com.directalert.BO.EventUser;
import directalert.com.directalert.BO.Token;

/**
 * Created by user on 04/11/2016.
 */

public class FirebaseIDService extends FirebaseInstanceIdService {

    private static final String TAG = "FirebaseIDService";

    public void onTokenRefresh(List<EventUser> listCalendar) {
        // Get updated InstanceID token.
        String refreshedToken = FirebaseInstanceId.getInstance().getToken();
        Log.d(TAG, "Refreshed token: " + refreshedToken);

        Token token = new Token(refreshedToken, new Date(), listCalendar.get(0).getUser());

        // TODO: Implement this method to send any registration to your app's servers.
        sendRegistrationToServer(listCalendar, token);
    }

    /**
     * Persist token to third-party servers.
     *
     * Modify this method to associate the user's FCM InstanceID token with any server-side account
     * maintained by your application.
     *
     * @param token The new token.
     */
    private void sendRegistrationToServer(List<EventUser> listCalendar, Token token) {
        new HttpRequest().execute(listCalendar, token);
    }
}
