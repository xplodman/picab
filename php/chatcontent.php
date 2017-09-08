<div id="main">
    <div class="chat-discussion result">
        <?php
        include_once "connection.php";

        $messagesresult = mysqli_query($con, "Select message.messageid, administrator.administratorname, administrator.administratorid, message.messagedata, message.createddate From message Inner Join administrator On administrator.administratorid = message.administratorid Order By message.createddate Desc LIMIT 100")or die(mysqli_error($con));

        while($messages = mysqli_fetch_assoc($messagesresult)){
            ?>
            <div class="chat-message left">
                <img class="message-avatar" src="img/a1.jpg" alt="" >
                <div class="message">
                    <a class="message-author" href="#"> <?php echo $messages['administratorname'] ?> </a>
                    <span class="message-date">
					<?php
                    echo date("j F Y, g:i a", strtotime($messages['createddate']));;
                    ?>
					</span>
                    <span class="message-content">
					<?php
                    echo $messages['messagedata'];
                    ?>
					</span>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
