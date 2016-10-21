package directalert.com.directalert;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ListView;

import directalert.com.directalert.BLL.ListEventUserAdapter;
import directalert.com.directalert.BO.ListEventUser;

public class ListEventUserActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_event_user);

        Bundle b    = getIntent().getExtras();
        ListEventUser listEventUser = b.getParcelable("listEventUser");

        //Création et initialisation de l'Adapter pour les personnes
        ListEventUserAdapter adapter = new ListEventUserAdapter(this, listEventUser);

        //Récupération du composant ListView
        ListView listEvent = (ListView)findViewById(R.id.listViewEvent);

        //Initialisation de la liste avec les données
        listEvent.setAdapter(adapter);
    }
}
