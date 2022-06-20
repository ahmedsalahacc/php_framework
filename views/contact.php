<div class="container">
    <h1><?php echo $header?></h1>
    <form action="/contact" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Subject</label>
            <input type="text" class="form-control" name="subject">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" name="email" class="form-control"  placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleCheck1">Body</label>
            <textarea type="checkbox" name="body" class="form-control" id="exampleCheck1"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>