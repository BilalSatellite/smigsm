<div>
    {{-- <div class="flex flex-col items-center justify-center px-10 space-y-4 ">
        <input wire:model.live="search">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Brand
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($result as $r)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $r->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $r->icType->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $r->icCategory->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $r->brand->name }}
                            </td>
                        </tr>
                    @empty
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                No Data
                            </th>
                            <td class="px-6 py-4">
                            </td>
                            <td class="px-6 py-4">
                            </td>
                            <td class="px-6 py-4">
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $result->links() }}
        </div>
    </div> --}}


</div>
