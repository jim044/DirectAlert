package directalert.com.directalert;

import android.content.Context;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import directalert.com.directalert.BLL.ListEventUser;
import directalert.com.directalert.BLL.ListEventUserAdapter;
import directalert.com.directalert.R;

public class ListEventUserActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_event_user);

        final Context context = getApplicationContext();
        final int duration = Toast.LENGTH_SHORT;



        Bundle b = getIntent().getExtras();
        final ListEventUser listEventUser = b.getParcelable("listEventUser");

        //Création et initialisation de l'Adapter pour les personnes
        ListEventUserAdapter adapter = new ListEventUserAdapter(this, listEventUser);

        //Récupération du composant ListView
        ListView listEvent = (ListView)findViewById(R.id.listViewEvent);

        listEvent.setOnItemClickListener(new AdapterView.OnItemClickListener()
        {
            public void onItemClick(AdapterView<?> arg0,View arg1, int position, long arg3)
            {
                //listEventUser.get(position).getDescription()

                Context context = getApplicationContext();
                int duration = Toast.LENGTH_LONG;

                Toast toast = Toast.makeText(context, listEventUser.get(position).getDescription(), duration);
                toast.show();
            }
        });

        //Initialisation de la liste avec les données
        listEvent.setAdapter(adapter);
    }

}
