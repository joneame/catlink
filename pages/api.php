 <p class="title"><strong>Catlink public API documentation</strong></p>
         
          <p><em>Create new link</em></p>
          <p>To create a new link, use this way: <strong>http://catlink.eu/api.php?link=[LONGURL]&cut=[CATURL]</strong></p>
          <p>Where [LONGURL] is the long url, and [CATURL] the new url.  CATURL is optional, if you don't specify it will be generated a random one.</p>
          <p>Be careful when giving the LONGURL, you must use <strong>urlencode </strong>before that.</p>
          <p>Possible answers:</p>
          <p>OK: http://catlink.eu/newcaturl<br />ERROR: "Message"</p>
         
          <p>Example:</p>
          <p>Using <strong>http://catlink.eu/api.php?link=http%3A%2F%2Fjoneame.net%2F&cut=joneame</strong> will return:</p>
          <p>OK: http://catlink.eu/joneame</p>
          <br />
