<h1>Products List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $product): ?>
    <tr>
      <td><a href="<?php echo url_for('product/edit?id='.$product->getId()) ?>"><?php echo $product->getId() ?></a></td>
      <td><?php echo $product->getName() ?></td>
      <td><?php echo $product->getPrice() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('product/new') ?>">New</a>
