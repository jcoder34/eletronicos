<div>
   <div class="form-group">
       <label for="total">Total:</label>
       <input wire:model="total" type="number" name="total" step="0.01" required />
       @error('total') <span class="error">{{ $message }}</span> @enderror
   </div>

    <div class="form-group">
        <select wire:model="itensId" wire:change="updateTotal" multiple="multiple" name="itens_id[]" id="itens_id">
        @foreach($itens as $item) 
            @if (is_array(old('itens_id')))
                <option value="{{ $item->id }}"
                @foreach(old('itens_id') as $i)
                    @if($item->id == $i->id) selected="selected"
                    @endif
                @endforeach
                >{{ $item->codigo }}</option>
            @else
                <option value="{{ $item->id }}">{{ $item->codigo }}</option>
            @endif
        @endforeach
        </select>
        @error('itens_id') <span class="error">{{ $message }}</span> @enderror
    </div>
    
    <div class="form-group">
        @foreach($itensId as $i)
            <label for="desconto_{{ $i }}">Desconto para {{ $itens->find($i)->codigo }}:</label>
            <input wire:change="desconto({{ $i }}, $el.value)" type="number" name="desconto_{{ $i }}" step="0.01" />
        
            <label for="promocao_{{ $i }}">Promoção para {{ $itens->find($i)->codigo }}:</label>
            <input wire:change="promocao({{ $i }}, $el.value)" type="number" name="promocao_{{ $i }}" step="0.01" />
        @endforeach
    </div>
</div>
