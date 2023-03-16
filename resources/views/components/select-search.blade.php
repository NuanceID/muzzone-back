<div
    id="{{$entity}}"
    x-data="{searchTerm: '' }"
    x-init="$store.{{$entity}}.fillOptionsIfExists()">
    <div class="form-group">

        <label for="select-{{$entity}}" class="form-label">{{$label}}</label>

        <input id="select-{{$entity}}"
               type="text"
               class="form-control w-100"
               placeholder="Начните вводить название"
               x-model="searchTerm"
               x-on:keydown.debounce.200ms="$store.{{$entity}}.search(searchTerm)"/>

        <ul class="list-group mt-2 shadow-sm" x-show="$store.{{$entity}}.options.length > 0">
            <template x-for="option in $store.{{$entity}}.options">
                <li class="list-group-item my-1" style="cursor: pointer"
                    x-text="option.name"
                    x-on:click="$store.{{$entity}}.selectItem(option.id, option.name); searchTerm = ''; $store.{{$entity}}.options = []"/>
            </template>
        </ul>
    </div>

    <div class="form-group mt-2" x-transition:enter.delay.1000ms>
        <template x-for="option in $store.{{$entity}}.selectedOptions">
            <div class="form-check">
                <input
                    name="{{$name}}"
                    type="checkbox"
                    :value="option.id"
                    :id="'option-'+ {{$entity}} + '_' + option.id"
                    checked
                    class="form-check-input"/>
                <label class="form-check-label" :for="'option-' + option.id" x-text="option.name"></label>
            </div>
        </template>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            const entity = @json($entity);
            const multiple = @json($multiple);
            const options = @json($options);

            Alpine.store('{{$entity}}', {
                options: [],
                selectedOptions: [],
                selectedIds: [],
                search(search) {
                    axios.get('/manager/dictionary/' + entity + '/' + search)
                        .then(response => {
                            this.options = response.data;
                        }).catch();
                },
                selectItem(id, name) {
                    if (!this.selectedIds.includes(id)) {
                        if (multiple) {
                            this.selectedIds.push(id)
                            this.selectedOptions.push({id: id, name: name})
                            console.log(this.selectedOptions);
                        } else {
                            this.selectedOptions = []
                            this.selectedOptions.push({id: id, name: name})
                        }
                    }
                },
                fillOptionsIfExists() {
                    if (options !== null) {
                        if (options.id === undefined) {
                            options.map(option => {
                                this.selectedOptions.push({id: option.id, name: option.name})
                            })
                        } else {
                            this.selectedOptions.push({id: options.id, name: options.name})
                        }
                    }
                }
            });
        });
    </script>
</div>
