<h1 style="text-align:center">Admin Paneli</h1>
<hr>
<br>
<br>

<div class="col-12 text-center">
    <a href="/" class="btn btn-outline-success">
        <i class="fas fa-pen mr-2"></i>
        Anasayfaya Dön
    </a>
</div>
<hr>
<br>
<section class="section section-blog-post">
        <div class="container">
                <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
                <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                <!------ Include the above in your HEAD tag ---------->
                      
                <div class="span7">   
                <div class="widget stacked widget-table action-table">
                                    
                                <div class="widget-header">
                                    
                                        <div class="col-12 text-right">
                                                <a href="/category/create" class="btn btn-outline-success">
                                                    <i class="fas fa-pen mr-2"></i>
                                                    Kategori Oluştur
                                                </a>
                                            </div>
                                    <hr>
                                    <h3>Kategoriler</h3>
                                </div> <!-- /widget-header -->
                                
                                <div class="widget-content">
                                    
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kategori Adı</th>
                                                <th>Oluşturulma Tarihi</th>
                                                <th class="td-actions"></th>
                                            </tr>
                                        </thead>
                                        @foreach ($categories as $category)
                                        <tbody>
                                            <tr>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->created_at}}</td>
                                                <td class="td-actions">
                                                        <a href="/removeCategory/{{$category->id}}" style="color:red">Kategoriyi Kaldır</a>
                                                </td>
                                            </tr>
                                        
                                            </tbody>
                                            @endforeach
                                        </table>
                                    
                                </div> <!-- /widget-content -->
                            
                            </div> <!-- /widget -->
                            
                        </div>


                        <div class="span7">   
                                <div class="widget stacked widget-table action-table">
                                                    
                                                <div class="widget-header">
                                                    
                                                    <hr>
                                                    <h3>Tüm Kullanıcılar</h3>
                                                </div> <!-- /widget-header -->
                                                
                                                <div class="widget-content">
                                                    
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Adı</th>
                                                                <th>Oluşturulma Tarihi</th>
                                                                <th>Email</th>
                                                                <th>Şehir</th>
                                                                <th>Adres</th>
                                                                <th class="td-actions"></th>
                                                            </tr>
                                                        </thead>
                                                        @foreach ($users as $user)
                                                        <tbody>
                                                            <tr>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->created_at}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td>{{$user->city}}</td>
                                                            <td>{{$user->adress}}</td>
                                                            </tr>
                                                        
                                                            </tbody>
                                                            @endforeach
                                                        </table>
                                                    
                                                </div> <!-- /widget-content -->
                                            
                                            </div> <!-- /widget -->
                                            
                                        </div>
                   


                                        <div class="span7">   
                                                <div class="widget stacked widget-table action-table">
                                                                    
                                                                <div class="widget-header">
                                                                    
                                                                        <div class="col-12 text-right">
                                                                               
                                                                            </div>
                                                                    <hr>
                                                                    <h3>Tüm Yorumlar</h3>
                                                                </div> <!-- /widget-header -->
                                                                
                                                                <div class="widget-content">
                                                                    
                                                                    <table class="table table-striped table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>İçerik</th>
                                                                                <th>Oluşturulma Tarihi</th>
                                                                                <th>Bulunduğu Blog</th>
                                                                                <th>Yorumun Sahibi</th>
                                                                                <th class="td-actions"></th>
                                                                            </tr>
                                                                        </thead>
                                                                        @foreach ($comments as $comment)
                                                                        <tbody>
                                                                            <tr>
                                                                            <td>{{$comment->comment}}</td>
                                                                            <td>{{$comment->created_at}}</td>
                                                                            <td>{{$comment->user['name']}}</td>
                                                                            <td>{{$comment->post['title']}}</td>
                                                                                <td class="td-actions">
                                                                                        <a href="/removeComment/{{$comment->id}}" style="color:red">Yorumu Kaldır</a>
                                                                                </td>
                                                                            </tr>
                                                                        
                                                                            </tbody>
                                                                            @endforeach
                                                                        </table>
                                                                    
                                                                </div> <!-- /widget-content -->
                                                            
                                                            </div> <!-- /widget -->
                                                            
                                                        </div>
                    </div>

</section>