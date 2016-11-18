package directalert.com.directalert.BLL;

import android.os.Parcel;
import android.os.Parcelable;

import java.util.ArrayList;

import directalert.com.directalert.BO.EventUser;

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

    @SuppressWarnings("rawtypes")
    public static final Parcelable.Creator CREATOR = new Parcelable.Creator()
    {
        public ListEventUser createFromParcel(Parcel in)
        {
            return new ListEventUser(in);
        }

        @Override
        public Object[] newArray(int size) {
            return null;
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
            dest.writeString(eventUser.getSummary());
            dest.writeString(eventUser.getDescription());
            dest.writeString(eventUser.getLocation());
            //dest.writeValue(eventUser.getUser());

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
            eventUser.setSummary(in.readString());
            eventUser.setDescription(in.readString());
            eventUser.setLocation(in.readString());
            //eventUser.setUser((User) in.readValue(getClass().getClassLoader()));

            this.add(eventUser);
        }

    }
}
