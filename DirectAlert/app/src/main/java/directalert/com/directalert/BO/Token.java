package directalert.com.directalert.BO;

import java.util.Date;

/**
 * Created by jimmy on 05/11/2016.
 */

public class Token {

    private String id_token;
    private Date date_creation;
    private User user;

    public Token(String id_token, Date date_creation, User user) {
        this.id_token = id_token;
        this.date_creation = date_creation;
        this.user = user;
    }

    public Token()
    {
    }

    /** Instance unique non préinitialisée */
    private static Token INSTANCE = new Token();

    /** Point d'accès pour l'instance unique du singleton */
    public static Token getInstance()
    {
        return INSTANCE;
    }

    public String getId_token() {
        return id_token;
    }

    public void setId_token(String id_token) {
        this.id_token = id_token;
    }

    public Date getDate_creation() {
        return date_creation;
    }

    public void setDate_creation(Date date_creation) {
        this.date_creation = date_creation;
    }

    public User getUser() {
        return user;
    }

    public void setUser(User user) {
        this.user = user;
    }
}
