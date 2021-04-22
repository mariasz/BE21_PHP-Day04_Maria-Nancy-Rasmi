<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
       <?php require_once 'components/boot.php'?>
       <title>hobbyblog  |  Add Content</title>
       <style>
           fieldset {
               margin: auto;
               margin-top: 100px;
               width: 60% ;
           }      
       </style>
   </head>
   <body>
       <fieldset>
           <legend class='h2'>Add Content</legend>
           <form action="actions/a_create.php"  method= "post" enctype= "multipart/form-data">
               <table  class='table'>
                   <tr>
                       <th>Postname</th>
                        <td><input  class ='form-control' type="text"  name="postname"  placeholder ="Postname" /></td>
                   </tr>   
                   <tr>
                       <th>Postcategory</th >
                       <td><input class= 'form-control' type="text"  name= "postcategory" placeholder ="Postcategory"/></td>
                   </tr>
                   <tr>
                       <th>Picture</th >
                       <td><input class= 'form-control' type="file"  name="picture" /></td>
                   </tr>
                   <tr>
                       <td><button class ='btn btn-success' type= "submit">Insert Product</button></td>
                       <td><a href="index.php" ><button class= 'btn btn-warning' type= "button">Home</button></a></td>
                   </tr>
               </table>
           </form>
       </fieldset>
   </body>
</html>