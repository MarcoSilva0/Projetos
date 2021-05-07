package br.com.stokestonkes.dal;
import java.sql.*;

/**
 *
 * @author marco.silva
 */
public class ModuloConexao {
    //Metodo responsavel por estabelecer a conexao com o banco
    public static Connection conector(){
        java.sql.Connection conexao = null;
        // a linha a abaixo "Chama" o driver de conexao
        String driver = "com.mysql.jdbc.Driver";
        // Armazenamento informacao referente ao banco
        String url = "jdbc:mysql://localhost:3306/stoke_stonks";
        String user = "root";
        String password = "";
        // Estabelecedor da conexao ao banco de dados
        try {
            Class.forName(driver);
            conexao = DriverManager.getConnection(url, user, password);
            return conexao;
        } catch (Exception e) {
            //A linha abaixo retorna o erro caso tenha dado algum problema em se conectar com o banco de dados
            System.out.println("Ocorreu um erro ao se conectar ao banco de dados erro: "+ e);
            return null;
        }
    }
}
