<!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Emp $emp
 */
?>
<div class="row">
<table>
  <tr> 
    <th>name</th>
    <th>address</th>
    <th>city</th>
    <th>pincode</th>
    <th>country</th>
  </tr>

  
  <tr>
    <td><?php echo $record['name'];?></td>
    <td><?php echo $record['address'];?></td>
    <td><?php echo $record['city'];?></td>
    <td><?php echo $record['pincode'];?></td>
    <td><?php echo $record['country'];?></td>
</tr>
  </table>
 -->
 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Emp $emp
 */
?>
  
    <div class="column-responsive column-80">
        <div class="emp view content">
            <table>
              <tr>
              <th><?= __('ID') ?></th>
                  <th><?= __('Name') ?></th>
                  <th><?= __('Address') ?></th>
                  <th><?= __('City') ?></th>
                  <th><?= __('Pincode') ?></th>
                  <th><?= __('Country') ?></th>
                  <th><?= __('ACTION') ?></th>
                </tr>
                  <?php
                foreach($results as $record){
                    ?>
                  <tr>
                  <td><?= h($record['id']) ?></td>
                  <td><?= h($record['name']) ?></td>
                    <td><?= h($record['address']) ?></td>
                    <td><?= h($record['city']) ?></td>
                    <td><?= h($record['pincode']) ?></td>
                    <td><?= h($record['country']) ?></td>
                   <td> <?= $this->Html->link(__('update'), ['action' => 'update',$record['id']], ['class' => 'side-nav-item']) ?></td>
                   <td> <?= $this->Html->link(__('delete'), ['action' => 'delete',$record['id']], ['class' => 'side-nav-item']) ?></td>
                   
                </tr>
                
                <?php
                }
                ?>
          
            </table>
        </div>
    </div>
</div>



    


<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <?= $this->Html->css(['style']) ?>
</head>
<body>
<div class="login-box">
  <h2>Regstration form</h2>
  <form method="POST">
    <div class="user-box">
      <input type="text" name="name" required="">
      <label>Name</label>
    </div>
    <div class="user-box">
      <input type="text" name="address" required="">
      <label>address</label>
    </div>
    <div class="user-box">
      <input type="text" name="city" required="">
      <label>city</label>
    </div>
    <div class="user-box">
      <input type="text" name="pincode" required="">
      <label>pincode</label>
    </div>
    <div class="user-box">
      <input type="text" name="country" required="">
      <label>country</label>
    </div>
    <a href="#">
      Submit
    </a>
  </form>
</div>
</body>
</html> -->
