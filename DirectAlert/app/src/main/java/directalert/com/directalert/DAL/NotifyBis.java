package directalert.com.directalert.DAL;

import android.os.AsyncTask;

import com.google.api.client.http.HttpResponse;
import com.squareup.okhttp.Response;

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.net.URLConnection;

/**
 * Created by user on 20/12/2016.
 */

public class NotifyBis extends AsyncTask<Void, Void, Void> {
    @Override
    protected Void doInBackground(Void... params) {
//        URL url = null;
//        try {
//            url = new URL( "http://jim044.000webhostapp.com/notifier.php" );
//        } catch (MalformedURLException e) {
//            e.printStackTrace();
//        }
//        HttpURLConnection conn = null;
//        try {
//            conn = (HttpURLConnection) url.openConnection();
//        } catch (IOException e) {
//            e.printStackTrace();
//        }
//        try {
//            if( conn.getResponseCode() == HttpURLConnection.HTTP_OK ){
//                InputStream is = conn.getInputStream();
//                // do something with the data here
//            }else{
//                InputStream err = conn.getErrorStream();
//                // err may have useful information.. but could be null see javadocs for more information
//            }
//        } catch (IOException e) {
//            e.printStackTrace();
//        }


//        URL url = null;
//        try {
//            url = new URL("http://jim044.000webhostapp.com/notifier.php");
//        } catch (MalformedURLException e) {
//            e.printStackTrace();
//        }
//
//        HttpURLConnection urlconnection = null;
//        try {
//            urlconnection = (HttpURLConnection) url.openConnection();
//        } catch (IOException e) {
//            e.printStackTrace();
//        }
//        urlconnection.setRequestProperty("Accept-Charset", "UTF-8");
//        urlconnection.setConnectTimeout(15000);
//        urlconnection.setDoOutput(true);
//        try {
//            urlconnection.setRequestMethod("POST");
//        } catch (ProtocolException e) {
//            e.printStackTrace();
//        }
//        try {
//            urlconnection.connect();
//        } catch (IOException e) {
//            e.printStackTrace();
//        }
//        // add more code here to send a run request ?
//        urlconnection.disconnect();


        return null;
    }
}
