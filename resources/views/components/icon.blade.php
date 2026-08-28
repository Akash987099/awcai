@props(['type' => 'edit'])

@if ($type === 'edit')
    <i class="fas fa-edit text-blue-600"></i>
@elseif ($type === 'delete')
    <i class="fas fa-trash text-red-600"></i>
@elseif ($type === 'view')
    <i class="fas fa-eye text-green-600"></i>
@elseif ($type === 'add')
    <i class="fas fa-plus text-green-600"></i>
@else
    <i class="fas fa-question text-gray-400"></i>
@endif
