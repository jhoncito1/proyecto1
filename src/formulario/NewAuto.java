/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formulario;

import com.mysql.jdbc.Connection;
import conexionSQL.ConexionSQL;
import java.sql.PreparedStatement;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author JHON.CHAVEZ
 */
public class NewAuto extends javax.swing.JFrame {
    
    ConexionSQL cc = new ConexionSQL();
    Connection con =cc.Conexion();
    public  static int id_auto;
    
//    Object txtplaca;
//    String nombre,apellido;

    /**
     * Creates new form NewAuto
     */
    public NewAuto() {
        initComponents();
        
        this.setLocationRelativeTo(null);        
    }
   
    
    
//    public NewAuto(int row) {
//        initComponents();
//        
//    }
//    
//   public NewAuto(String id) {
//        initComponents();
//        
//        this.setLocationRelativeTo(null);
//    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        txtPlaca = new javax.swing.JTextField();
        txtMarcaA = new javax.swing.JTextField();
        txtModeloA = new javax.swing.JTextField();
        txtColorA = new javax.swing.JTextField();
        btnInsertar = new javax.swing.JButton();
        btnModificarAuto = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jLabel1.setText("Placa:");

        jLabel2.setText("Marca:");

        jLabel3.setText("Modelo:");

        jLabel4.setText("Color:");

        btnInsertar.setText("Insertar");
        btnInsertar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnInsertarActionPerformed(evt);
            }
        });

        btnModificarAuto.setText("Actualizar");
        btnModificarAuto.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnModificarAutoActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(25, 25, 25)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel1)
                    .addComponent(jLabel2)
                    .addComponent(jLabel3)
                    .addComponent(jLabel4))
                .addGap(37, 37, 37)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(btnInsertar)
                        .addGap(18, 18, 18)
                        .addComponent(btnModificarAuto))
                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                        .addComponent(txtMarcaA, javax.swing.GroupLayout.DEFAULT_SIZE, 169, Short.MAX_VALUE)
                        .addComponent(txtModeloA)
                        .addComponent(txtPlaca)
                        .addComponent(txtColorA)))
                .addContainerGap(114, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(31, 31, 31)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel1)
                    .addComponent(txtPlaca, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(17, 17, 17)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel2)
                    .addComponent(txtMarcaA, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3)
                    .addComponent(txtModeloA, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(22, 22, 22)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel4)
                    .addComponent(txtColorA, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(37, 37, 37)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btnInsertar)
                    .addComponent(btnModificarAuto))
                .addContainerGap(47, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btnInsertarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnInsertarActionPerformed
        insertarAuto();
        limpiarCajas();
    }//GEN-LAST:event_btnInsertarActionPerformed

    private void btnModificarAutoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnModificarAutoActionPerformed
        actualizarAuto();
        limpiarCajas();
    }//GEN-LAST:event_btnModificarAutoActionPerformed

    
    public void insertarAuto(){
        try {
            String SQLa = "insert into automovil (placa, marca, modelo, color) values (?,?,?,?)";
            PreparedStatement pst = con.prepareStatement(SQLa);
            pst.setString(1, txtPlaca.getText());
            pst.setString(2, txtMarcaA.getText());
            pst.setString(3, txtModeloA.getText());
            pst.setString(4, txtColorA.getText());
            
            pst.execute();
            JOptionPane.showMessageDialog(null, "Registro exitoso");
            
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, "Error de Registro"+ e.getMessage());
        }
    }
    
    public  void limpiarCajas(){
        txtPlaca.setText("");
        txtMarcaA.setText("");
        txtModeloA.setText("");
        txtColorA.setText("");
    }
    
    public void actualizarAuto(){
        
        try {
            String SQLa = "update automovil set placa=?, marca=?, modelo=?, color=? where id_auto=?";
            
            
            PreparedStatement pst = con.prepareStatement(SQLa);
            pst.setString(1, txtPlaca.getText());
            pst.setString(2, txtMarcaA.getText());
            pst.setString(3, txtModeloA.getText());
            pst.setString(4, txtColorA.getText());
            pst.setString(5, String.valueOf(id_auto));
            
            pst.execute();
            JOptionPane.showMessageDialog(null, "Registro actualizado");
            
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, "Error al modificar"+ e.getMessage());
        }
        
    }
    
    
    
    
    
    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(NewAuto.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(NewAuto.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(NewAuto.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(NewAuto.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new NewAuto().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    public static javax.swing.JButton btnInsertar;
    public static javax.swing.JButton btnModificarAuto;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    public static javax.swing.JTextField txtColorA;
    public static javax.swing.JTextField txtMarcaA;
    public static javax.swing.JTextField txtModeloA;
    public static javax.swing.JTextField txtPlaca;
    // End of variables declaration//GEN-END:variables
}
