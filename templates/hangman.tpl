
<div style="Background-color:#7D9DB3; border-radius: 25px; box-shadow: 10px 10px 5px grey">
  <br> 
  <div style="Background-color: #E6C200; text-align:center; width:600px; margin:auto; border-radius: 25px; text-shadow: 2px 2px 7px blue;  border: 2px solid grey">
    <h1>John's Hangman Machine 3000</h1>
  </div>
  <br><br>
  <!-- BEGIN WRONGGUESSES -->
   <div style="Background-color: #A1B6CA; text-align:center; width:500px; height:300px; margin:auto; border-radius: 25px; box-shadow: 10px 10px 5px grey">
   	<br>
     {picture}
   </div>
  <!-- END WRONGGUESSES -->
 
  <div style = "Background-color: #E6C200; text-align:center; width:500px; margin:auto; border-radius: 25px; box-shadow: 10px 10px 5px grey">
    <ul  style="list-style-type: none; margin:0; padding:0">
      <!-- BEGIN letters -->
        <li style="display:inline; margin-right: 5px; text-shadow: 1px 1px 5px"><b>{letter}</b></li>
      <!-- END letters -->
    </ul>

  </div>
  <!-- BEGIN newGame -->
    <div style = "Background-color:lightgrey; width:200px;text-align:center; margin:auto; border-radius: 25px; text-shadow: 1px 1px 5px; box-shadow: 10px 10px 5px grey">
      <font color = "white"><b>{newGame}</b></font>
    </div>
    <br><br>
  <!-- END newGame -->  
  <div style = "Background-color:#E6C200; text-align:center; width:700px; margin:auto; border-radius: 25px; border: 2px solid grey">
    <h2><b>{wordGuess}</b></h2>
  </div>
  <br>
  <div style = "Background-color:lightgrey; text-align:center; width:600px; margin:auto; border-radius: 25px; transform: translate(0px, -380px); box-shadow: 12px 12px 8px black; font-style: oblique; text-shadow: 0px 0px 5px grey">
    <h3><font color ="#A15858">{loss}{won}</font></h3>
  </div>
</div>