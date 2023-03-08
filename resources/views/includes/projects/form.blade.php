   <form action="{{ route('admin.projects.store') }}" method='POST' novalidate>
       @csrf
       <div class="row">
           <div class="col md-6">

               <div class="mb-3">
                   <label for="title" class="form-label">Title</label>
                   <input type="text" class="form-control" id="title" name='title' required>
                   <div class='text-muted'>Inserisci il titolo</div>
               </div>
           </div>
           <div class="col md-6">

               <div class="mb-3">
                   <label for="thumb" class="form-label">Immagine</label>
                   <input type="url" class="form-control" id="thumb" name='thumb' required>
                   <div class='text-muted'>Inserisci l'url dell'immagine</div>
               </div>
           </div>
       </div>
       <div class="row">


           <div class="col"></div>

           <div class="mb-3">
               <label for="description" class="form-label">Descrizione del progetto</label>
               <textarea class="form-control" id="description" name='description' rows="8"></textarea>
           </div>
       </div>
       <hr>
       <footer class='d-flex justify-content-end'>
           <a href="{{ route('admin.projects.index') }}" class='btn btn-secondary me-2'>Torna ai progetti</a>
           <button type='submit' class='btn btn-success'>Salva</button>
       </footer>
   </form>
