<?php
//**************** Notification class Created for displaying notification messages across the website ****************
	class Notification
	{
	
		var $notice;	
		var $timeout;
	
		function __construct()
		{
			$this->notice=$_SESSION['msg'];
			$this->error=$_SESSION['error_msg'];
			$this->infomsg=$_SESSION['info_msg'];
			$this->warningmsg=$_SESSION['warning_msg'];
			$this->timeout=10000;
		}
		function SetNote($note)
		{
			$this->notice=$note;
		}
		
		function SetTimeout($SetTimeout)
		{
			$this->SetTimeout=$SetTimeout;
		}
		
		function Notify()
		{
			?>
            <style>
			.closebtn {
			margin-left: 15px;
			color: white;
			font-weight: bold;
			float: right;
			font-size: 22px;
			line-height: 20px;
			cursor: pointer;
			transition: 0.3s;
			}
			</style>
            <?php
			
			if($this->notice!='') {
			?>
			<script type="text/javascript">
			// notification
                setTimeout(function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 10000,
			  			positionClass: "toast-top-center"
                    };
                    toastr.success('<?php echo $this->notice;?>', 'Success');
                }, 1300);
			</script> 
            <div id="message_t" class="alert alert-success" style="width:25%; position:absolute; left:40%; top:0; z-index:1;" align="center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <i class="icon-check_circle"></i><strong>Success!</strong><br>
                <?php echo $this->notice;?>
            </div>
			
			<?php
			$this->destroy_note();
			}
			else if($this->error!='')
			{
			?>
			<script type="text/javascript">
				// notification
                setTimeout(function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 10000,
			  			positionClass: "toast-top-center"
                    };
                    toastr.error('<?php echo $this->error;?>', 'Error');
                }, 1300);
			</script>
			<?php
			$this->destroy_note();
			}
			else if($this->infomsg!='')
			{
			?>
			<script type="text/javascript">
				// notification
                setTimeout(function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 10000,
			  			positionClass: "toast-top-center"
                    };
                    toastr.info('<?php echo $this->infomsg;?>', 'Info');
                }, 1300);
			</script>
			<?php
			$this->destroy_note();
			}
			else if($this->warningmsg!='')
			{
			?>
			<script type="text/javascript">
				// notification
                setTimeout(function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 10000,
			  			positionClass: "toast-top-center"
                    };
                    toastr.warning('<?php echo $this->warningmsg;?>', 'Warning');
                }, 1300);
			</script>
			<?php
			$this->destroy_note();
			}
		}
		
		function destroy_note()
		{
			$_SESSION['msg']='';
			$_SESSION['error_msg']='';
			$_SESSION['info_msg']='';
			$_SESSION['warning_msg']='';
		}
	
	}

?>