package directalert.com.directalert.BO;

import com.google.api.client.util.DateTime;

import java.sql.Time;
import java.sql.Timestamp;
import java.util.Date;

/**
 * Created by user on 21/01/2017.
 */

public class Position {
    private int id;
    private User user;
    private Token token;
    private Double latitude;
    private Double longitude;
    private Timestamp date_position;

    public Position(int id, User user, Token token, Double latitude, Double longitude, Timestamp date_position) {
        this.id = id;
        this.user = user;
        this.token = token;
        this.latitude = latitude;
        this.longitude = longitude;
        this.date_position = date_position;
    }

    public Position(Double latitude, Double longitude, Timestamp date_position) {
        this.latitude = latitude;
        this.longitude = longitude;
        this.date_position = date_position;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public User getUser() {
        return user;
    }

    public void setUser(User user) {
        this.user = user;
    }

    public Token getToken() {
        return token;
    }

    public void setToken(Token token) {
        this.token = token;
    }

    public Double getLatitude() {
        return latitude;
    }

    public void setLatitude(Double latitude) {
        this.latitude = latitude;
    }

    public Double getLongitude() {
        return longitude;
    }

    public void setLongitude(Double longitude) {
        this.longitude = longitude;
    }

    public Timestamp getDate_position() {
        return date_position;
    }

    public void setDate_position(Timestamp date_position) {
        this.date_position = date_position;
    }
}
