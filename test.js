<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>YUI Tree Test</title>
<link rel="stylesheet" type="text/css" href="build/fonts/fonts-min.css" />
    <link rel="stylesheet" type="text/css" href="build/treeview/assets/skins/sam/treeview.css" />
    <script type="text/javascript" src="build/yahoo/yahoo.js"></script>
    <script type="text/javascript" src="build/event/event.js"></script>
    <script type="text/javascript" src="build/treeview/treeview.js"></script>

    <script type="text/javascript">
    function init(){
        var treeView = new YAHOO.widget.TreeView('demoTreeDiv');
        var node1 = new YAHOO.widget.TextNode("node",treeView.getRoot(),false);
        var node2 = new YAHOO.widget.TextNode("node1",node1,false);
        var node3 = new YAHOO.widget.TextNode("node2",node2,false);
        var node4 = new YAHOO.widget.TextNode("node3",node3,false);
        var node5 = new YAHOO.widget.TextNode("node4",node3,false);
        treeView.draw();
    }
    </script>
    </head>
    <body onload="init()">
    <div id="demoTreeDiv" style="margin:10px; border:1px solid #EEE;"></div>
    </body>
    </html>