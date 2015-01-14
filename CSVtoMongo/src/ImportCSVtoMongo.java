/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author Amit
 */
/**
 * Created by Amit on 08-01-2015.
 */

import com.mongodb.*;
import com.mongodb.MongoClient;
import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.net.UnknownHostException;
import java.util.Scanner;
import java.util.logging.Level;
import java.util.logging.Logger;


public class ImportCSVtoMongo {

      public static void main(String[] args) {

          
        ImportCSVtoMongo obj = new ImportCSVtoMongo();
        obj.run();
    }

    public void run()
    {
        String csvFile = "";

        BufferedReader br = null;

        String line = "";

        String csvSplitBy = "##";
        
        Scanner io = new Scanner(System.in);
        
        int i = 1;
        try{
                MongoClient mongo = new MongoClient("localhost",27017);
                DB db = mongo.getDB("doep");
                //
                System.out.println("Enter the csv file path");
                csvFile = io.next();
                
                System.out.println("Enter the collection name you want to create");
                String coll_name = io.next();
                
                db.createCollection(coll_name, null);
                
                DBCollection coll = db.getCollection(coll_name);
                System.out.println("Connected to Collection");
                
                BasicDBObject doc = new BasicDBObject();
               
              
              br = new BufferedReader(new FileReader(csvFile));
              
              int q_no=1;
            while((line = br.readLine()) != null){

                //use comma seperated values
                String[] question = line.split(csvSplitBy);
                System.out.println(i++);
                System.out.println("Question:"+question[1]);
                System.out.println("Option1:"+question[2]);
                System.out.println("Option2:"+question[3]);
                System.out.println("Option3:"+question[4]);
                System.out.println("Option4:"+question[5]);
                System.out.println("ANSWER: "+question[6]);
                System.out.println();
                
                doc.put("qid",coll_name+q_no);
                doc.put("quest",question[1]);
                doc.put("op1",question[2]);
                doc.put("op2",question[3]);
                doc.put("op3",question[4]);
                doc.put("op4",question[5]);
                doc.put("ans",question[6]);
                doc.put("image","none");
                
                coll.insert(doc);
                q_no++;
                doc.clear();
                
                }
            }catch (UnknownHostException ex) {
              Logger.getLogger(ImportCSVtoMongo.class.getName()).log(Level.SEVERE, null, ex);
          }catch (FileNotFoundException e)
        {

        }catch (IOException e){

        }finally {
            if (br != null){
                try{
                    br.close();
                }
                catch (IOException e){
                    e.printStackTrace();
                }
            }
        }

    }

}

