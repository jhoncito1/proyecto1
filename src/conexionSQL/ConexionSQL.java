
package conexionSQL;

import com.mysql.jdbc.Connection;
import java.awt.HeadlessException;
import java.sql.DriverManager;
import java.sql.SQLException;
import javax.swing.JOptionPane;


public class ConexionSQL {
    Connection conectar = null;
    public Connection Conexion(){
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conectar = (Connection) DriverManager.getConnection("jdbc:mysql://localhost/transporte","root","");
            
            //JOptionPane.showMessageDialog(null, "conexion exitosa");
        } 
        catch (HeadlessException | ClassNotFoundException | SQLException e) {
            JOptionPane.showMessageDialog(null, "Error de conexion" + e.getMessage());
        }
        return conectar;
    }
    
}
