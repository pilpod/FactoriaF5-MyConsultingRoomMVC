<section>

  <form class="form-group" action="?action=edit&id=<?= $data["appointment"]->getId() ?>" method="POST">
      
      <label for="inputEditName">Nombre</label>
      <input type="text" class="form-control bg-dark-lighter border-primary" id="inputEditName" name="name" placeholder="Name" value="<?= $data["appointment"]->getName() ?>" required>

      <label for="inputEditReason">Motivo de la visita</label>
      <select id="inputEditReason" class="form-control bg-dark-lighter  border-primary" name="topic" required>
        <option selected><?= $data["appointment"]->getTopic() ?></option>
          <option>no me anda el php</option>
          <option>el perro se comió mi tarea</option>
          <option>ayudenme porfavor señor Sergi</option>
          <option>otros</option>
      </select>


      <label for="inputEditDescription">Detalle su inquietud</label>
      <textarea type="text" rows="10" class="form-control bg-dark-lighter  border-primary" id="inputEditDescription" name="description" placeholder="Description" required><?= $data["appointment"]->getDescription() ?></textarea>
        
    
      <div class="modal-footer border-0">
        
      <button type="reset" class="btn btn-outline-primary">Borrar</button>
      <button type="submit" class="btn btn-outline-primary">Editar</button>

      </div>
  </form>

</section>
