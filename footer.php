<!-- Footer -->
<?php
if(strpos($_SERVER['REQUEST_URI'],'noauthorize') && strpos($_SERVER['REQUEST_URI'],"recuringpage"))
{         
    ?>
    <div class="bg-dark col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center py-2" id="footer">
        <div class="text-white">
            <span class="text-secondary"><?php echo FOOTER ?> <a href="#" class="text-white" title="">Niftysol</a></span>
		</div>
    </div>
        <?php
}
   elseif(strpos($_SERVER['REQUEST_URI'],'no') && strpos($_SERVER['REQUEST_URI'],"recuringpage")){
        ?>
	<div class="bg-dark col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center py-2" id="footer">
        <div class="text-white">
            <span class="text-secondary"><?php echo FOOTER ?> <a href="#" class="text-white" title="">Niftysol</a></span>
		</div>
    </div>
<?php    
}
elseif(strpos($_SERVER['REQUEST_URI'],"recuringpage")){
    ?>
	<div class="bg-dark col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center py-2" id="footer">
        <div class="text-white">
            <span class="text-secondary"><?php echo FOOTER ?> <a href="#" class="text-white" title="">Niftysol</a></span>
		</div>
    </div>
<?php   
}
        else
        {
            ?>        
	<div class="bg-dark col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center py-2"id="footer" >
		<div class="text-white">
            <span class="text-secondary"><?php echo FOOTER ?> <a href="#" class="text-white" title="">Niftysol</a></span>
		</div>
	</div>
         <?php
        }
    ?>
</body>
</html>
