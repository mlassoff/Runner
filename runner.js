 window.onload=function()
            {
                getGrid();
            }
            
            function getGrid()
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open('POST', 'init.php', true);
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                            var out="<table>";
                            out += "<tr><th>Date</th><th>Distance</th><th>Comment</th><th>Delete</th></tr>";
                            var theData =xmlhttp.responseXML.documentElement.getElementsByTagName('run');
                            for(var x=0; x< theData.length; x++)
                                {
                                    if(x%2==0)
                                    {
                                        out += "<tr class='odd'><td>" + theData[x].getElementsByTagName('runDate')[0].firstChild.nodeValue + "</td>";
                                    } else
                                    {
                                        out += "<tr class='even'><td>" + theData[x].getElementsByTagName('runDate')[0].firstChild.nodeValue + "</td>";
                                    }
                                    
                                    out += "<td>" + theData[x].getElementsByTagName('runDistance')[0].firstChild.nodeValue + "</td>";
                                    out += "<td>" + theData[x].getElementsByTagName('runComment')[0].firstChild.nodeValue + "</td>";
                                    out += "<td><button onClick='deleteRecord(";
                                    out +=  theData[x].getElementsByTagName('runID')[0].firstChild.nodeValue + ")'>Delete</button></td></tr>";
                                }
                            out += "</table>"
                            document.getElementById('dataTable').innerHTML = out;
                        }
                }
                xmlhttp.send();
            }
            
            function saveRecord()
            {
                var date = document.getElementById('runDate').value;
                var distance = document.getElementById('runDistance').value;
                var runComment = document.getElementById('runComment').value;
                var xmlhttp = new XMLHttpRequest();
                var url = "saveRecord.php?runDate=" + date + "&runDistance=" + distance + "&runComment=" + runComment;
                xmlhttp.open('GET', url, true);
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                            window.location.reload();
                        }
                }
                xmlhttp.send();
               

            }
            
            function deleteRecord(x)
            {
                
                var xmlhttp = new XMLHttpRequest();
                url = "delete.php?runId=" + x;
                xmlhttp.open('GET', url, true);
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                            window.location.reload();
                        }
                }
                xmlhttp.send();
            }