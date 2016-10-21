package directalert.com.directalert.BO;

import android.os.Parcel;
import android.os.Parcelable;

import com.google.api.client.util.DateTime;

import java.util.ArrayList;

/**
 * Created by user on 21/10/2016.
 */

public class ListEventUser extends ArrayList<EventUser> implements Parcelable {

    public ListEventUser()
    {

    }
    protected ListEventUser(Parcel in) {
        this.getFromParcel(in);
    }

    public static final Creator<ListEventUser> CREATOR = new Creator<ListEventUser>() {
        @Override
        public ListEventUser createFromParcel(Parcel in) {
            return new ListEventUser(in);
        }

        @Override
        public ListEventUser[] newArray(int size) {
            return new ListEventUser[size];
        }
    };

    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        //Taille de la liste
        int size = this.size();
        dest.writeInt(size);
        for(int i=0; i < size; i++)
        {
            EventUser eventUser = this.get(i);
            dest.writeString(eventUser.getId());
            dest.writeString(String.valueOf(eventUser.getStart()));
            dest.writeString(eventUser.getSummary());
            dest.writeString(eventUser.getDescription());
            dest.writeString(eventUser.getLocation());

        }
    }

    public void getFromParcel(Parcel in)
    {
        // On vide la liste avant tout remplissage
        this.clear();

        //Récupération du nombre d'objet
        int size = in.readInt();

        //On repeuple la liste avec de nouveau objet
        for(int i = 0; i < size; i++)
        {
            EventUser eventUser = new EventUser();
            eventUser.setId(in.readString());
            eventUser.setStart(in.readByte());
            eventUser.setSummary(in.readString());
            eventUser.setDescription(in.readString());
            eventUser.setLocation(in.readString());

            this.add(eventUser);
        }

    }
}
