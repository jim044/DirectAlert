package directalert.com.directalert.BO;

import java.util.Date;

/**
 * Created by user on 19/10/2016.
 */

public class User {

    private String id;
    private int nbConnexion;
    private String mail;
    private Date date_ajout;

    public User(String mail) {
        this.mail = mail;
    }

    public User(String id, int nbConnexion) {
        this.id = id;
        this.nbConnexion = nbConnexion;
    }

    public User(String id, String mail) {
        this.id = id;
        this.mail = mail;
    }

    public User(String id, int nbConnexion, String mail, Date date_ajout) {
        this.id = id;
        this.nbConnexion = nbConnexion;
        this.mail = mail;
        this.date_ajout = date_ajout;
    }



    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public int getNbConnexion() {
        return nbConnexion;
    }

    public void setNbConnexion(int nbConnexion) {
        this.nbConnexion = nbConnexion;
    }

    public String getMail() {
        return mail;
    }

    public void setMail(String mail) {
        this.mail = mail;
    }

    public Date getDate_ajout() {
        return date_ajout;
    }

    public void setDate_ajout(Date date_ajout) {
        this.date_ajout = date_ajout;
    }
}
