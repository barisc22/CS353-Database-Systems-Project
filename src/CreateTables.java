import java.sql.*;

public class CreateTables {

    public static void main(String[] args) {
        Connection connection;
        String url = "jdbc:mysql://139.179.11.31/merve_kilicarslan";
        String username = "merve.kilicarsla";
        String password = "cMg5Qorn";

        try {
            connection = DriverManager.getConnection(url, username, password);
            Statement st = connection.createStatement();

            //Drop the tables if they exist
            st.executeUpdate("DROP TABLE IF EXISTS interview_questions");
            st.executeUpdate("DROP TABLE IF EXISTS test_cases");
            st.executeUpdate("DROP TABLE IF EXISTS nc_submit");
            st.executeUpdate("DROP TABLE IF EXISTS nc_saved");
            st.executeUpdate("DROP TABLE IF EXISTS saved");
            st.executeUpdate("DROP TABLE IF EXISTS controls");
            st.executeUpdate("DROP TABLE IF EXISTS includes");
            st.executeUpdate("DROP TABLE IF EXISTS consists_of");
            st.executeUpdate("DROP TABLE IF EXISTS submit");
            st.executeUpdate("DROP TABLE IF EXISTS solves");
            st.executeUpdate("DROP TABLE IF EXISTS applies");
            st.executeUpdate("DROP TABLE IF EXISTS cv_pool");
            st.executeUpdate("DROP TABLE IF EXISTS ncquestion_choices");
            st.executeUpdate("DROP TABLE IF EXISTS noncoding_question");
            st.executeUpdate("DROP TABLE IF EXISTS contest_question");
            st.executeUpdate("DROP TABLE IF EXISTS coding_challenge");
            st.executeUpdate("DROP TABLE IF EXISTS contest_user");
            st.executeUpdate("DROP TABLE IF EXISTS coding_contest");
            st.executeUpdate("DROP TABLE IF EXISTS interview");
            st.executeUpdate("DROP TABLE IF EXISTS user");
            st.executeUpdate("DROP TABLE IF EXISTS editor");
            st.executeUpdate("DROP TABLE IF EXISTS company");
            st.executeUpdate("DROP TABLE IF EXISTS general_user");

            //Create tables
            st.executeUpdate("CREATE TABLE general_user(\n" +
                    "   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,\n" +
                    "   password VARCHAR (10) NOT NULL,\n" +
                    "   email VARCHAR (50) NOT NULL,\n" +
                    "   username VARCHAR (20) NOT NULL UNIQUE\n" +
                    "   ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE user(\n" +
                    "   id INT NOT NULL PRIMARY KEY,\n" +
                    "   total_score INT NOT NULL,\n" +
                    "   birth_date DATE,\n" +
                    "   user_bio VARCHAR (500),\n" +
                    "   FOREIGN KEY (id) REFERENCES general_user (id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "   ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE editor(\n" +
                    "   id INT NOT NULL PRIMARY KEY,\n" +
                    "   question_count INT NOT NULL,\n" +
                    "   penalty_points INT NOT NULL,\n" +
                    "   FOREIGN KEY (id) REFERENCES general_user (id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "   ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE company(\n" +
                    "   id INT NOT NULL PRIMARY KEY,\n" +
                    "   validation BIT NOT NULL,\n" +
                    "   company_bio VARCHAR (500),\n" +
                    "   FOREIGN KEY (id) REFERENCES general_user (id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "   ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE interview(\n" +
                    "   interview_id INT NOT NULL AUTO_INCREMENT,\n" +
                    "   c_id INT NOT NULL,\n" +
                    "   int_password VARCHAR(10) NOT NULL,\n" +
                    "   int_link VARCHAR(100) NOT NULL,\n" +
                    "   start_date DATE NOT NULL,\n" +
                    "   end_date DATE NOT NULL,\n" +
                    "   duration SMALLINT NOT NULL,\n" +
                    "   PRIMARY KEY (interview_id, c_id),\n" +
                    "   FOREIGN KEY (c_id) REFERENCES company (id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "   ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE coding_contest(\n" +
                    "   contest_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,\n" +
                    "   start_date DATE NOT NULL,\n" +
                    "   end_date DATE NOT NULL,\n" +
                    "   title VARCHAR(20) NOT NULL\n" +
                    "   ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE contest_user(\n" +
                    "   id INT NOT NULL,\n" +
                    "   contest_id INT NOT NULL,\n" +
                    "   finish_time SMALLINT,\n" +
                    "   submission VARCHAR(20000),\n" +
                    "   saved VARCHAR(20000),\n" +
                    "   contest_score INT,\n" +
                    "   rank INT,\n" +
                    "   PRIMARY KEY (id, contest_id),\n" +
                    "   FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE,\n" +
                    "   FOREIGN KEY (contest_id) REFERENCES coding_contest (contest_id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "   ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE coding_challenge(\n" +
                    "   challenge_id INT NOT NULL AUTO_INCREMENT,\n" +
                    "   e_id INT NOT NULL,\n" +
                    "   question VARCHAR(500) NOT NULL,\n" +
                    "   percentage NUMERIC(2,2),\n" +
                    "   difficulty VARCHAR(10) NOT NULL,\n" +
                    "   title VARCHAR(20) NOT NULL,\n" +
                    "   solution VARCHAR(5000),\n" +
                    "   category VARCHAR(50) NOT NULL,\n" +
                    "   PRIMARY KEY (challenge_id, e_id),\n" +
                    "   FOREIGN KEY (e_id) REFERENCES editor (id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "   ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE contest_question(\n" +
                    "   challenge_id INT NOT NULL,\n" +
                    "   contest_id INT NOT NULL,\n" +
                    "   PRIMARY KEY (challenge_id),\n" +
                    "   FOREIGN KEY (challenge_id) REFERENCES coding_challenge (challenge_id) ON DELETE CASCADE ON UPDATE CASCADE,\n" +
                    "   FOREIGN KEY (contest_id) REFERENCES coding_contest (contest_id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "   ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE noncoding_question(\n" +
                    "   question_id INT NOT NULL AUTO_INCREMENT,\n" +
                    "   question VARCHAR(500) NOT NULL,\n" +
                    "   percentage NUMERIC(2,2),\n" +
                    "   title VARCHAR(20) NOT NULL,\n" +
                    "   category VARCHAR(50) NOT NULL,\n" +
                    "   reward INT NOT NULL,\n" +
                    "   mult_choice_label BIT,\n" +
                    "   PRIMARY KEY (question_id)\n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE ncquestion_choices(\n" +
                    "   question_id INT NOT NULL,\n" +
                    "   choice VARCHAR(50),\n" +
                    "   PRIMARY KEY (question_id, choice),\n" +
                    "   FOREIGN KEY (question_id) REFERENCES noncoding_question (question_id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE cv_pool(\n" +
                    "   c_id INT NOT NULL,\n" +
                    "   job_title VARCHAR(100) NOT NULL,\n" +
                    "   job_desc VARCHAR(1000) NOT NULL,\n" +
                    "   requirements VARCHAR(1000),\n" +
                    "   opening_no SMALLINT NOT NULL,\n" +
                    "   min_score INT,\n" +
                    "   PRIMARY KEY (c_id, job_title),\n" +
                    "   FOREIGN KEY (c_id) REFERENCES company (id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE applies(\n" +
                    "   user_id INT NOT NULL,\n" +
                    "   c_id INT NOT NULL,\n" +
                    "   job_title VARCHAR(100) NOT NULL,\n" +
                    "   cv VARCHAR(50),\n" +
                    "   PRIMARY KEY (user_id, c_id, job_title),\n" +
                    "   FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE,\n" +
                    "   FOREIGN KEY (c_id, job_title) REFERENCES cv_pool (c_id, job_title) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE solves(\n" +
                    "   user_id INT NOT NULL,\n" +
                    "   interview_id INT NOT NULL,\n" +
                    "   grade INT,\n" +
                    "   submission VARCHAR(5000),\n" +
                    "   PRIMARY KEY (user_id, interview_id),\n" +
                    "   FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE,\n" +
                    "   FOREIGN KEY (interview_id) REFERENCES interview (interview_id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE submit(\n" +
                    "   user_id INT NOT NULL,\n" +
                    "   challenge_id INT NOT NULL,\n" +
                    "   pl VARCHAR(10) NOT NULL,\n" +
                    "   submission VARCHAR(5000),\n" +
                    "   PRIMARY KEY (user_id, challenge_id),\n" +
                    "   FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE,\n" +
                    "   FOREIGN KEY (challenge_id) REFERENCES coding_challenge (challenge_id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE consists_of(\n" +
                    "   interview_id INT NOT NULL,\n" +
                    "   challenge_id INT NOT NULL,\n" +
                    "   PRIMARY KEY (interview_id, challenge_id),\n" +
                    "   FOREIGN KEY (interview_id) REFERENCES interview (interview_id) ON DELETE CASCADE ON UPDATE CASCADE,\n" +
                    "   FOREIGN KEY (challenge_id) REFERENCES coding_challenge (challenge_id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE includes(\n" +
                    "   interview_id INT NOT NULL,\n" +
                    "   question_id INT NOT NULL,\n" +
                    "   PRIMARY KEY (interview_id, question_id),\n" +
                    "   FOREIGN KEY (interview_id) REFERENCES interview (interview_id) ON DELETE CASCADE ON UPDATE CASCADE,\n" +
                    "   FOREIGN KEY (question_id) REFERENCES noncoding_question (question_id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE controls(\n" +
                    "   e_id INT NOT NULL,\n" +
                    "   user_id INT NOT NULL,\n" +
                    "   contest_id INT NOT NULL,\n" +
                    "   PRIMARY KEY (e_id, user_id, contest_id),\n" +
                    "   FOREIGN KEY (e_id) REFERENCES editor (id) ON DELETE CASCADE ON UPDATE CASCADE,\n" +
                    "   FOREIGN KEY (user_id, contest_id) REFERENCES contest_user (id, contest_id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "   \n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE saved(\n" +
                    "   challenge_id INT NOT NULL,\n" +
                    "   user_id INT NOT NULL,\n" +
                    "   saved_sol VARCHAR(5000),\n" +
                    "   PRIMARY KEY (challenge_id, user_id),\n" +
                    "   FOREIGN KEY (challenge_id) REFERENCES coding_challenge (challenge_id) ON DELETE CASCADE ON UPDATE CASCADE,\n" +
                    "   FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "   \n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE nc_saved(\n" +
                    "   question_id INT NOT NULL,\n" +
                    "   user_id INT NOT NULL,\n" +
                    "   attempt VARCHAR(5000),\n" +
                    "   PRIMARY KEY (question_id, user_id),\n" +
                    "   FOREIGN KEY (question_id) REFERENCES noncoding_question (question_id) ON DELETE CASCADE ON UPDATE CASCADE,\n" +
                    "   FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "   \n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE nc_submit(\n" +
                    "   user_id INT NOT NULL,\n" +
                    "   question_id INT NOT NULL,\n" +
                    "   submission VARCHAR(5000),\n" +
                    "   votes int,\n" +
                    "   PRIMARY KEY (user_id, question_id),\n" +
                    "   FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE,\n" +
                    "   FOREIGN KEY (question_id) REFERENCES noncoding_question (question_id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE test_cases(\n" +
                    "   challenge_id INT NOT NULL,\n" +
                    "   test_case VARCHAR(500) NOT NULL,\n" +
                    "   PRIMARY KEY (challenge_id, test_case),\n" +
                    "   FOREIGN KEY (challenge_id) REFERENCES coding_challenge (challenge_id) ON DELETE CASCADE ON UPDATE CASCADE   \n" +
                    "  ) ENGINE=InnoDB;");

            st.executeUpdate("CREATE TABLE interview_questions(\n" +
                    "   interview_id INT NOT NULL,\n" +
                    "   c_id INT NOT NULL,\n" +
                    "   interview_question VARCHAR(500) NOT NULL,\n" +
                    "   PRIMARY KEY (interview_id, c_id, interview_question),\n" +
                    "   FOREIGN KEY (interview_id, c_id) REFERENCES interview (interview_id, c_id) ON DELETE CASCADE ON UPDATE CASCADE\n" +
                    "  ) ENGINE=InnoDB;");

            showTables(connection);

        } catch (SQLException ex) {
            System.out.println("SQLException: " + ex.getMessage());
            System.out.println("SQLState: " + ex.getSQLState());
            System.out.println("VendorError: " + ex.getErrorCode());
        }
    }

    public static void showTables(Connection conn) throws SQLException {
        ResultSet rs;
        DatabaseMetaData meta = conn.getMetaData();
        rs = meta.getTables(null, null, null, new String[]{
                "TABLE"
        });
        int count = 0;
        System.out.println("All table names are in test database:");
        while (rs.next()) {
            String tblName = rs.getString("TABLE_NAME");
            System.out.println(tblName);
            count++;
        }
        System.out.println(count + " Rows in set ");
    }
}