import java.lang.String;

import org.apache.solr.client.solrj.impl.ConcurrentUpdateSolrClient;
import org.apache.solr.client.solrj.impl.HttpSolrClient;
import org.apache.solr.client.solrj.response.QueryResponse;
import org.apache.solr.client.solrj.response.UpdateResponse;
import org.apache.solr.client.solrj.SolrClient;
import org.apache.solr.client.solrj.SolrQuery;
import org.apache.solr.client.solrj.SolrServerException;
import org.apache.solr.common.SolrDocumentList;
import org.apache.solr.common.SolrDocument;


/* 
 * This utility modifies every field DATE setted to "1992-07-10T17:33:18Z" and clean the noise of the field CONTENT. 
 * It uses the content filename (exactly, 8 characters after "TEXT_CRE_") to fix the relative DATE field: 
 * the final format will be yyyy-mm-ggT17:33:18Z, the suffix will be always "T17:33:18Z".
 * The field CONTENT needs to be cleaned if you have created it as a "copy-field" that chatch all "_text" as I did.
 * So this code cleans the first part of that field. In another words, it delete everything before the real file content.
 * It is possible to use a different threads number or a different SolrServer just change the final variables.
 * 
 * No input required. No output expected (except possible errors).
 * 
 * Check https://github.com/Mirk01/Google-Trends-with-Solr-PHP-UI to see the remaining code
 * */
 

public class Update {
	
	private final static int threads = 2;  //number of threads used by ConcurrentUpdateSolrClient
	private final static int buffer = 50000;  //max number of elements fetched each cycle (rows in the result and buffer dimension)
	private final static String url = "http://localhost:8983/solr/SOLR-CORE-NAME";  //url server

	public static void main (String []args)throws Exception {
		
		String y, m, g;
		
		SolrClient client = new HttpSolrClient(url);		
		SolrQuery query = new SolrQuery();
		query.setParam("rows", Integer.toString(buffer));
		
		ConcurrentUpdateSolrClient server = new ConcurrentUpdateSolrClient(url, buffer, threads);
		
		try {
			query.setQuery("DATE:\"1992-07-10T17:33:18Z\""); //query to select the elements to modify them
			QueryResponse response = client.query(query);
			SolrDocumentList list = response.getResults();
			
			while(list.getNumFound() > 0){ //loop until there will fetch elements with the set query
					
				for(SolrDocument solrDocument : list) {

					/* Set DATE field */
					String a = (String)solrDocument.getFieldValue("id");
					a = a.replaceFirst(".*TEXT_CRE_","");  //there will be selected 8 characters after this prefix
					String[] parts = a.split("_");
					
					y = parts[0].substring(0, 4);
					m = parts[0].substring(4, 6);
					g = parts[0].substring(6, 8);
									
					solrDocument.setField("DATE", y+"-"+m+"-"+g+"T17:33:18Z");
					
					
					/* Fix CONTENT field */
					a = (String)solrDocument.getFieldValue("CONTENT");
					a = a.replaceFirst("(?s).*.txt ","");  //there will be selected 8 characters after this prefix
					solrDocument.setField("CONTENT", a);
					
					//transform a SolrDocument in a SolrInputDocument, this is needed by the ConcurrentUpdateSolrClient function.
					server.add(org.apache.solr.client.solrj.util.ClientUtils.toSolrInputDocument(solrDocument));			
					
				}
				server.commit(); //send all modifications to the Solr server
				System.out.println(list.getNumFound()+" fields fixed");
				response = client.query(query); //look for next $buffer (max) results
				list = response.getResults();
			}
			System.out.println("Index optimization..");
			server.optimize(); //rebuild the index, if it is neessary
		} catch(SolrServerException e) {
            e.printStackTrace();
        }		
	}
}
