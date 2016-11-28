package directalert.com.directalert;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.Parcelable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.List;

import directalert.com.directalert.BLL.ListEventUser;
import directalert.com.directalert.BLL.ListEventUserAdapter;
import directalert.com.directalert.BO.EventUser;
import directalert.com.directalert.R;

public class ListEventUserActivity extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_event_user);

        final Context context = getApplicationContext();
        final int duration = Toast.LENGTH_SHORT;
        int passage = 0;
        final ListEventUser uneListEvent = new ListEventUser();
        final ListEventUser uneListEventBis = new ListEventUser();

        Bundle b = getIntent().getExtras();
        final ListEventUser listEventUser = b.getParcelable("listEventUser");

        for(int i=0; i < listEventUser.size(); i++)
        {
            if(passage == 0) {
                uneListEvent.add(listEventUser.get(i));
                passage = 1;
            }
            else
            {
                uneListEventBis.add(listEventUser.get(i));
                passage = 0;
            }
        }


        //Création et initialisation de l'Adapter pour les personnes
        ListEventUserAdapter adapter = new ListEventUserAdapter(this, uneListEvent);
        ListEventUserAdapter adapterBis = new ListEventUserAdapter(this, uneListEventBis);

        //Récupération du composant ListView
        ListView listEvent = (ListView)findViewById(R.id.listViewEvent);
        ListView listEventBis = (ListView)findViewById(R.id.listViewEventBis);

//        listEvent.setOnItemClickListener(new AdapterView.OnItemClickListener()
//        {
//            public void onItemClick(AdapterView<?> arg0,View arg1, int position, long arg3)
//            {
//                //listEventUser.get(position).getDescription()
//
//                int duration = Toast.LENGTH_LONG;
//
//                Toast toast = Toast.makeText(context, listEventUser.get(position).getSummary(), duration);
//                toast.show();
//            }
//        });
//
//        listEventBis.setOnItemClickListener(new AdapterView.OnItemClickListener()
//        {
//            public void onItemClick(AdapterView<?> arg0,View arg1, int position, long arg3)
//            {
//                //listEventUser.get(position).getDescription()
//
//                int duration = Toast.LENGTH_LONG;
//
//                Toast toast = Toast.makeText(context, listEventUser.get(position).getSummary(), duration);
//                toast.show();
//            }
//        });

        //Initialisation de la liste avec les données
        listEvent.setAdapter(adapter);
        listEventBis.setAdapter(adapterBis);

        TextView txt_barre = (TextView) findViewById(R.id.textviewBarre);
        txt_barre.setBackgroundColor(Color.parseColor("#005BCC"));
    }
}
