<div>
    @if($etape === 1)
        <livewire:etape2-component :key="$etape" />
    @elseif($etape === 2)
        <livewire:etape3-component :key="$etape" />
  
    @endif

    <!-- Boutons de navigation entre les étapes -->
    <div>
        @if($etape > 1)
            <button wire:click="arriere">Précédent</button>
        @endif

        @if($etape < 3) <!-- Vous pouvez ajuster le nombre d'étapes ici -->
            <button wire:click="suivant">Suivant</button>
        @else
            <button wire:click="valider">Soumettre</button>
        @endif
    </div>
</div>