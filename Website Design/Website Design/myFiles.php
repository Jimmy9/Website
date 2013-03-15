<?php include 'header.php'; ?>

<style>
    .leftButtonPanel{
        padding-bottom: 20px;
        margin-left: auto;
        margin-right: auto;
        width:40%;
        height: 30px;
    }
    .leftButtonPanel li{
        padding-bottom: 20px;
        list-style: none;
        display: inline-block;
    }
    
</style>
<div class="container">
    <br />
    <div style="width:80%; margin-left: 10%; top: -5%;"> 
        <table align="center" id="myFileHeaderTable">
            <tr><th class="checkbox"></th><th class="fileName">File Name</th><th class="fileSize">File Size ?</th><th class="lastUpdate">Last Updated</th><th class="owner">Owner</th><td class="empty"></td></tr>
        </table>
    </div>
    <div style="height: 500px; width: 80%; overflow-y:auto; overflow-x: hidden; margin-left: 10%; top:-10%;">
        <table align="center" id="myFileTable">
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td class="checkbox"><input type="checkbox" id="someID" ></td><td class="fileName">Some Other File Name </td><td class="fileSize">75 KB</td><td class="lastUpdate">2/4/2013 9:47 AM</td><td class="owner">John Doe</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name 2 </td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>            
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
        </table>
    </div>
    <div class="leftButtonPanel">
        <ul>
            <li><a class="navButton" href="" >Edit in workspace</a></li>
            <li><a class="navButton" href="" >View in workspace</a></li>
            <li><a class="navButton" href="" >Delete File</a></li>
        </ul>
    </div>






</div>
<?php include 'footer.php';?>

