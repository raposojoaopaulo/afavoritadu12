<div class="contact-form">
  @if(request('success') === 'true')
    <div id="success-message" class="success-message">
      Mensagem enviada com sucesso!
    </div>
  @endif
  @if(request('error'))
    <div id="error-message" class="alert alert-danger bg-red-500 text-white p-3 rounded mb-4">
      {{ request('error') }}
    </div>
  @endif
  <form action="{{ route('contact.submit', ['slug' => $store->slug]) }}" method="POST">
    @csrf
    <div class="formGroup">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" class="formControl" value="{{ old('name') }}" required>
    </div>
    <div class="formGroup">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" class="formControl" value="{{ old('email') }}" required>
    </div>
    <div class="formGroup website">
        <label for="website">Website:</label>
        <input type="website" name="website" id="website" class="formControl" value="{{ old('website') }}">
    </div>
    <div class="formRow">
      <div class="formGroup">
        <label for="city">Cidade:</label>
        <input type="text" name="city" id="city" class="formControl" value="{{ old('city') }}" required>
      </div>
      <div class="formGroup">
        <label for="phone">Telefone:</label>
        <input type="text" name="phone" id="phone" class="formControl" value="{{ old('phone') }}" required>
    </div>    
    </div>
    <div class="formGroup">
        <label for="subject">Assunto:</label>
        <input type="text" name="subject" id="subject" class="formControl" value="{{ old('subject') }}" required>
    </div>
    <div class="formGroup">
        <label for="message">Mensagem:</label>
        <textarea name="message" id="message" class="formControl" rows="5" required>{{ old('message') }}</textarea>
    </div>
    <button type="submit" class="">Enviar</button>
  </form>
</div>

<script type='text/javascript' src='//code.jquery.com/jquery-compat-git.js'></script>
<script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>

<script>
    var behavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
options = {
    onKeyPress: function (val, e, field, options) {
        field.mask(behavior.apply({}, arguments), options);
    }
};

$('#phone').mask(behavior, options);
</script>