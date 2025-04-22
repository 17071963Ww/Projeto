export function setupMultiTagSelector(containerId = 'tags-component') {
    const container = document.getElementById(containerId);
    if (!container) return;

    const allTagWrapper = container.querySelector('#all-tags');
    const selectedWrapper = container.querySelector('#selected-tags');
    const acceptBtnWrapper = container.querySelector('#accept-button-wrapper');

    const selected = new Set();

    function toggleAcceptButton() {
        if (selected.size > 0) {
            acceptBtnWrapper.classList.remove('opacity-0', 'scale-90', 'pointer-events-none');
            acceptBtnWrapper.classList.add('opacity-100', 'scale-100', 'pointer-events-auto');
        } else {
            acceptBtnWrapper.classList.remove('opacity-100', 'scale-100', 'pointer-events-auto');
            acceptBtnWrapper.classList.add('opacity-0', 'scale-90', 'pointer-events-none');
        }
    }

    function updateSelectedTags(valueToAdd) {
        const tagEl = document.createElement('span');
        tagEl.className = 'selected-tag px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm cursor-pointer transition duration-300 hover:bg-indigo-700 opacity-0 translate-y-4';
        tagEl.textContent = valueToAdd;

        tagEl.addEventListener('click', () => {
            selected.delete(valueToAdd);

            // anima a saída
            tagEl.classList.add('opacity-0', '-translate-y-2');
            tagEl.classList.remove('translate-y-0');

            setTimeout(() => {
                tagEl.remove();

                // Recriar tag embaixo
                const restored = document.createElement('span');
                restored.className = 'tag px-4 py-2 bg-indigo-100 text-indigo-800 rounded-xl cursor-pointer transition duration-300 hover:bg-indigo-200 opacity-0 scale-90';
                restored.dataset.tag = valueToAdd;
                restored.textContent = valueToAdd;

                restored.addEventListener('click', () => handleTagClick(restored));
                allTagWrapper.appendChild(restored);

                setTimeout(() => {
                    restored.classList.remove('opacity-0', 'scale-90');
                }, 10);

                toggleAcceptButton();
            }, 300);
        });

        selectedWrapper.appendChild(tagEl);

        requestAnimationFrame(() => {
            tagEl.classList.remove('opacity-0', 'translate-y-4');
            tagEl.classList.add('opacity-100', 'translate-y-0');
        });

        toggleAcceptButton();
    }

    function handleTagClick(tag) {
        const value = tag.dataset.tag;

        if (selected.has(value)) return;

        selected.add(value);

        tag.classList.add('opacity-0', 'scale-90');
        tag.style.transition = 'all 300ms ease';

        setTimeout(() => {
            tag.remove();
            updateSelectedTags(value);
        }, 300);
    }

    const tagElements = container.querySelectorAll('.tag');
    tagElements.forEach(tag => {
        tag.addEventListener('click', () => handleTagClick(tag));
    });
}
