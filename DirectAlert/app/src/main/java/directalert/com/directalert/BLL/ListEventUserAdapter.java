package directalert.com.directalert.BLL;

import android.content.Context;
import android.content.res.AssetManager;
import android.graphics.Color;
import android.graphics.Typeface;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.google.api.client.util.DateTime;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;

import directalert.com.directalert.BO.EventUser;
import directalert.com.directalert.R;

/**
 * Created by user on 21/10/2016.
 */

public class ListEventUserAdapter extends BaseAdapter {

    // Une liste de personnes
    private List<EventUser> mListEvent;
    //Le contexte dans lequel est présent notre adapter
    private Context mContext;
    //Un mécanisme pour gérer l'affichage graphique depuis un layout XML
    private LayoutInflater mInflater;

    public ListEventUserAdapter(Context context, List<EventUser> aListEvent)
    {
        mContext = context;
        mListEvent = aListEvent;
        mInflater = LayoutInflater.from(mContext);
    }

    @Override
    public int getCount() {
        return mListEvent.size();
    }

    @Override
    public Object getItem(int position) {
        return mListEvent.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        LinearLayout layoutItem;
        //(1) : Réutilisation des layouts
        if (convertView == null) {
            //Initialisation de notre item à partir du  layout XML "personne_layout.xml"
            layoutItem = (LinearLayout) mInflater.inflate(R.layout.preview_listview, parent, false);
        } else {
            layoutItem = (LinearLayout) convertView;
        }

        //(2) : Récupération des TextView de notre layout
        TextView txt_Summary = (TextView)layoutItem.findViewById(R.id.summary);
        //TextView txt_Description = (TextView)layoutItem.findViewById(R.id.description);
        TextView txt_Location = (TextView)layoutItem.findViewById(R.id.location);
        TextView txt_driving = (TextView)layoutItem.findViewById(R.id.driving);
        TextView txt_transit = (TextView)layoutItem.findViewById(R.id.transit);
        TextView txt_bicycling = (TextView)layoutItem.findViewById(R.id.bicycling);
        TextView txt_walking = (TextView)layoutItem.findViewById(R.id.walking);
        //(3) : Renseignement des valeurs

        String dateStart = mListEvent.get(position).getStart().toString();
        dateStart = dateStart.substring(0,4) + '/' + dateStart.substring(5,7) + '/' + dateStart.substring(8,10) + ' ' + dateStart.substring(11,13) + "H " + dateStart.substring(14,16) + "MIN " + dateStart.substring(17,19) + "S";

        txt_Summary.setText(" " + mListEvent.get(position).getSummary() + " (Le : " + dateStart + ")");
        //txt_Description.setText(mListEvent.get(position).getDescription());
        txt_Location.setText(" " +  mListEvent.get(position).getLocation());
        txt_driving.setText(" " +  mListEvent.get(position).getDriving());
        txt_transit.setText(" " +  mListEvent.get(position).getTransit());
        txt_bicycling.setText(" " +  mListEvent.get(position).getBicycling());
        txt_walking.setText(" " +  mListEvent.get(position).getWalking());

        txt_driving.setTextColor(Color.BLACK);
        txt_transit.setTextColor(Color.BLACK);
        txt_bicycling.setTextColor(Color.BLACK);
        txt_walking.setTextColor(Color.BLACK);

        if(txt_driving.getText().equals(" En retard"))
        {
            txt_driving.setTextColor(Color.RED);
        }
        else if (!txt_driving.getText().equals(" Non disponible"))
        {
            txt_driving.setTextColor(Color.parseColor("#408000"));
        }

        if(txt_transit.getText().equals(" En retard"))
        {
            txt_transit.setTextColor(Color.RED);
        }
        else if (!txt_transit.getText().equals(" Non disponible"))
        {
            txt_transit.setTextColor(Color.parseColor("#408000"));
        }

        if(txt_bicycling.getText().equals(" En retard"))
        {
            txt_bicycling.setTextColor(Color.RED);
        }
        else if (!txt_bicycling.getText().equals(" Non disponible"))
        {
            txt_bicycling.setTextColor(Color.parseColor("#408000"));
        }

        if(txt_walking.getText().equals(" En retard"))
        {
            txt_walking.setTextColor(Color.RED);
        }
        else if (!txt_walking.getText().equals(" Non disponible"))
        {
            txt_walking.setTextColor(Color.parseColor("#408000"));
        }

        setFont(txt_Summary,"AgencyR.TTF");
        //setFont(txt_Description,"AgencyR.TTF");
        setFont(txt_Location,"AgencyR.TTF");
        setFont(txt_driving,"AgencyR.TTF");
        setFont(txt_transit,"AgencyR.TTF");
        setFont(txt_bicycling,"AgencyR.TTF");
        setFont(txt_walking,"AgencyR.TTF");

        //On retourne l'item créé.
        return layoutItem;
    }

    public void setFont(TextView textView, String fontName) {
        if(fontName != null){
            try {
                Typeface typeface = Typeface.createFromAsset(mContext.getAssets(), "fonts/" + fontName);
                textView.setTypeface(typeface);
            } catch (Exception e) {
                Log.e("FONT", fontName + " not found", e);
            }
        }
    }


}
