package directalert.com.directalert.BO;

/**
 * Created by user on 19/10/2016.
 */

public class User {

    private String id;
    private int nbConnexion;

    public User(String id) {
        this.id = id;
    }

    public User(String id, int nbConnexion) {
        this.id = id;
        this.nbConnexion = nbConnexion;
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
}
