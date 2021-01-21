<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Test Modal</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <form>
                          <div class="form-group">
                               <label for="recipient-name" class="col-form-label">Recipient:</label>
                               <select id="inputState" class="form-control">
                                    <option value="john">Person 1</option>
                                    <option value="adam">Person 2</option>
                                    <option value="marcus">Person 3</option>
                                    <option value="anthony">Person 4</option>
                               </select>
                          </div>
                          <div class="form-group">
                               <label for="message-text" class="col-form-label">Message:</label>
                               <textarea class="form-control" id="message-text"></textarea>
                          </div>
                     </form>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Send message</button>
                </div>
           </div>


<script>
    $( document ).ready(function(){
        $('#inputState').on('change', function(){
        $('#message-text').val($('#inputState').val())
        })
    })
</script>