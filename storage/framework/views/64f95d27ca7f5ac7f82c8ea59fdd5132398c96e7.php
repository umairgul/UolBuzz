
    
        
        
            
        
            
        

        
        
            
        
            
        
    


<?php if($paginator->hasPages()): ?>
        
        <?php if($paginator->onFirstPage()): ?>
            
            <a class="btn btn-default btn-sm disabled"><span class="glyphicon glyphicon-arrow-left"></span></a>
        <?php else: ?>
            
            <a class="btn btn-default btn-sm" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"><span class="glyphicon glyphicon-arrow-left"></span></a>
        <?php endif; ?>

        
        <?php if($paginator->hasMorePages()): ?>
            
            <a class="btn btn-default btn-sm pull-right" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"><span class="glyphicon glyphicon-arrow-right"></span></a>
        <?php else: ?>
            
            <a href="" class="btn btn-default btn-sm disabled pull-right"><span class="glyphicon glyphicon-arrow-right"></span></a>
        <?php endif; ?>
<?php endif; ?>