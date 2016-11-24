package directalert.com.directalert.BO;

import android.os.Parcel;
import android.os.Parcelable;

import com.google.api.client.util.DateTime;

import java.util.Date;

/**
 * Created by user on 19/10/2016.
 */

public class EventUser implements Parcelable {

    private String id; //Utile
    private Date created; //Utile
    private String creator;
    private String end;
    private int etag;
    private String htmlLink;
    private String iCalUID;
    private String kind;
    private String organizer;
    private String reminders;
    private int sequence;
    private DateTime start;
    private String status;
    private DateTime updated; //Utile
    private String summary; //Utile
    private String description; //Utile
    private String location; //Utile
    private String driving;
    private String transit;
    private String bicycling;
    private String walking;
    private User user; //Utile

    public EventUser(String id, DateTime start, String summary, String description, String location, User user, String driving, String transit, String bicycling, String walking) {
        this.id = id;
        this.start = start;
        this.summary = summary;
        this.description = description;
        this.location = location;
        this.user = user;
        this.driving = driving;
        this.transit = transit;
        this.bicycling = bicycling;
        this.walking = walking;
    }

    public EventUser()
    {

    }
    public EventUser(String id, DateTime start, String summary, String description, String location, User user) {
        this.id = id;
        this.start = start;
        this.summary = summary;
        this.description = description;
        this.location = location;
        this.user = user;
    }

    public EventUser(String id, DateTime start, String summary, String location, User user) {
        this.id = id;
        this.start = start;
        this.summary = summary;
        this.description = description;
        this.location = location;
        this.user = user;
    }

//    public EventUser(String id, DateTime start, String summary, String description, String location, DateTime updated, User user) {
//        this.id = id;
//        this.start = start;
//        this.summary = summary;
//        this.description = description;
//        this.location = location;
//        this.updated = updated;
//        this.user = user;
//    }

    public EventUser(String id, DateTime start, String summary, String description, String location) {
        this.id = id;
        this.start = start;
        this.summary = summary;
        this.description = description;
        this.location = location;
    }

    public EventUser(String id, String summary, String description, String location) {
        this.id = id;
        this.summary = summary;
        this.description = description;
        this.location = location;
    }

    public EventUser(String id, String summary, String description, String location, User user) {
        this.id = id;
        this.summary = summary;
        this.description = description;
        this.location = location;
        this.user = user;
    }

    public String getDriving() {
        return driving;
    }

    public void setDriving(String driving) {
        this.driving = driving;
    }

    public String getTransit() {
        return transit;
    }

    public void setTransit(String transit) {
        this.transit = transit;
    }

    public String getBicycling() {
        return bicycling;
    }

    public void setBicycling(String bicycling) {
        this.bicycling = bicycling;
    }

    public String getWalking() {
        return walking;
    }

    public void setWalking(String walking) {
        this.walking = walking;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public Date getCreated() {
        return created;
    }

    public void setCreated(Date created) {
        this.created = created;
    }

    public String getCreator() {
        return creator;
    }

    public void setCreator(String creator) {
        this.creator = creator;
    }

    public String getEnd() {
        return end;
    }

    public void setEnd(String end) {
        this.end = end;
    }

    public int getEtag() {
        return etag;
    }

    public void setEtag(int etag) {
        this.etag = etag;
    }

    public String getHtmlLink() {
        return htmlLink;
    }

    public void setHtmlLink(String htmlLink) {
        this.htmlLink = htmlLink;
    }

    public String getiCalUID() {
        return iCalUID;
    }

    public void setiCalUID(String iCalUID) {
        this.iCalUID = iCalUID;
    }

    public String getKind() {
        return kind;
    }

    public void setKind(String kind) {
        this.kind = kind;
    }

    public String getOrganizer() {
        return organizer;
    }

    public void setOrganizer(String organizer) {
        this.organizer = organizer;
    }

    public String getReminders() {
        return reminders;
    }

    public void setReminders(String reminders) {
        this.reminders = reminders;
    }

    public int getSequence() {
        return sequence;
    }

    public void setSequence(int sequence) {
        this.sequence = sequence;
    }

    public DateTime getStart() {
        return start;
    }

    public void setStart(DateTime start) {
        this.start = start;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public DateTime getUpdated() {
        return updated;
    }

    public void setUpdated(DateTime updated) {
        this.updated = updated;
    }

    public String getSummary() {
        return summary;
    }

    public void setSummary(String summary) {
        this.summary = summary;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getLocation() {
        return location;
    }

    public void setLocation(String location) {
        this.location = location;
    }

    public User getUser() {
        return user;
    }

    public void setUser(User user) {
        this.user = user;
    }


    public EventUser(Parcel in)
    {
        this.getFromParcel(in);
    }

    @SuppressWarnings("rawtypes")
    public static final Parcelable.Creator CREATOR = new Parcelable.Creator()
    {
        public EventUser createFromParcel(Parcel in)
        {
            return new EventUser(in);
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

    //On ecrit dans le parcel les données de notre objet
    @Override
    public void writeToParcel(Parcel dest, int flags)
    {
        dest.writeString(this.getId());
        dest.writeString(this.getSummary());
        dest.writeString(this.getDescription());
        dest.writeString(this.getLocation());
        dest.writeString(this.getDriving());
        dest.writeString(this.getTransit());
        dest.writeString(this.getBicycling());
        dest.writeString(this.getWalking());

    }

    //On va ici hydrater notre objet à partir du Parcel
    public void getFromParcel(Parcel in)
    {
        this.setId(in.readString());
        this.setSummary(in.readString());
        this.setDescription(in.readString());
        this.setLocation(in.readString());
        this.setDriving(in.readString());
        this.setTransit(in.readString());
        this.setBicycling(in.readString());
        this.setWalking(in.readString());
    }

}

