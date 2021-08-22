<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dynamic Dependent Select Box in Vue.js using PHP</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  
 </head>
 <body>

  <div class="container" id="vdiApp">
   <br />
   <h3 align="center">VDI ASSESMENT</h3>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">Select type of document</div>
    <div class="panel-body">
     <div class="form-group">
      <label>Select Category</label>
      <select class="form-control input-lg" v-model="select_category" @change="fetchDocument">
       <option value="">Select Category</option>
       <option v-for="data in category_data" :value="data.category_id">{{ data.category }}</option>
      </select>
           </div>
           <div class="form-group">
      <label>Select type of Document</label>
      <select class="form-control input-lg" v-model="select_document"  @input="display()">
       <option value="">Select type of Document</option>
       <option v-for="data in document_data" :value="data.document_id">{{ data.name }}</option>
      </select>
           </div>
    </div>
   </div>
   <div class="panel panel-default">
          <div  align="center">
           <div  style="display: inline-block">
                    <p style="fonts-size: 15px" v-if="categorySelected">Enter new document name to be added in Category ID : {{select_category}} : </p>
           </div>
           <div style="display: inline-block">
                    <input v-if="categorySelected" class="" type="form-control" 
                            v-model="new_document_name">
          </div>
          </div>
             <button class="form-control input-lg"  v-model="new_document_name" @Click="Add">Add</button>
        </div>
   <div class="panel panel-default">
          <center>
            <p v-if="documentSelected">Enter new name for selected Document ID : {{select_document}}</p>  
             <input v-if="documentSelected" type="form-control" v-model="new_name">
          </center>
             <button class="form-control input-lg"  v-model="new_name" @Click="Add">Edit</button>
        </div>

    <div class="panel panel-default">
             <button class="form-control input-lg"  @Click="Delete">Delete</button>
        </div>
   </div>
  </div>

 </body>
</html>

<script>
var application = new Vue({
 el:'#vdiApp',
 data:{
  select_category:'',
  category_data:'',
  select_document:'',
  document_data:'',
 },
 methods:{
     display()
     {
          application.documentSelected=true;
     },
  fetchCategory:function(){
   axios.post("action.php", {
    request_for:'category'
   }).then(function(response){
    application.category_data = response.data;
    application.select_document = '';
    application.document_data = '';

   });
  },
  fetchDocument:function(){
   axios.post("action.php", {
    request_for:'document',
    category_id:this.select_category
   }).then(function(response){
    application.document_data = response.data;
    application.select_document = '',
    application.categorySelected=true;
   });
  },
  Delete:function(){
     axios.post("action.php", {
      request_for:'delete',
      document_id:this.select_document
     }).then(function(response){
          window.location.reload();
   });
  },
  Add:function(){
     axios.post("action.php", {
      request_for:'Add',
      category_id:this.select_category,
      new_document_name:this.new_document_name
     }).then(function(response){
          window.location.reload();
   });
  },
  Add:function(){
     axios.post("action.php", {
      request_for:'Edit',
      document_id:this.select_document,
      new_name:this.new_name
     }).then(function(response){
          window.location.reload();
   });
  }
 }, 
 created:function(){
  this.fetchCategory();
  }
 });
</script>