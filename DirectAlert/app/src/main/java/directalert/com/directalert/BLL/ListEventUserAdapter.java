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
        //TextView tv_Description = (TextView)layoutItem.findViewById(R.id.description);
        TextView tv_Location = (TextView)layoutItem.findViewById(R.id.location);
        TextView txt_driving = (TextView)layoutItem.findViewById(R.id.driving);
        TextView tv_transit = (TextView)layoutItem.findViewById(R.id.transit);
        TextView tv_bicycling = (TextView)layoutItem.findViewById(R.id.bicycling);
        TextView txt_walking = (TextView)layoutItem.findViewById(R.id.walking);
        //(3) : Renseignement des valeurs


        txt_Summary.setText(" " + mListEvent.get(position).getSummary() + "(Le : " + mListEvent.get(position).getStart() + ")");
        //tv_Description.setText(mListEvent.get(position).getDescription());
        tv_Location.setText(" " +  mListEvent.get(position).getLocation());
        txt_driving.setText(" " +  mListEvent.get(position).getDriving());
        tv_transit.setText(" " +  mListEvent.get(position).getTransit());
        tv_bicycling.setText(" " +  mListEvent.get(position).getBicycling());
        txt_walking.setText(" " +  mListEvent.get(position).getWalking());

        setFont(txt_Summary,"AgencyR.TTF");
        //setFont(tv_Description,"AgencyR.TTF");
        setFont(tv_Location,"AgencyR.TTF");
        setFont(txt_driving,"AgencyR.TTF");
        setFont(tv_transit,"AgencyR.TTF");
        setFont(tv_bicycling,"AgencyR.TTF");
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
