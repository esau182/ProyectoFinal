<div>
    <ul style="display: flex; gap: 20px; align-items: center;">
        <li style="display: flex; align-items: center;">
            <form wire:submit="delete" class="text-primary cursor-pointer" style="margin: 0;">
                <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; display: flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                        <path d="M3 6h18"/>
                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                        <line x1="10" x2="10" y1="11" y2="17"/>
                        <line x1="14" x2="14" y1="11" y2="17"/>
                    </svg>
                </button>
            </form>
        </li>
    </ul>
</div>
