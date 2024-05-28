
<div>
    @can('tasks_create')
    <a href="{{route('tasks.create')}}"> add new task</a>
    @endcan
</div>


<td>

    @can('tasks_edit')
    <a href="{{route('tasks.edit', $task)}}"> edit</a>
        
    @endcan


    
    @can('tasks_delete')
    <form action="{{route('tasks.destroy', $task)}}"  method="post"  >
    
     @csrf
     @method('delete')
        <button>delete</button>
    
    </form>
        
    @endcan


</td>




{{-- this is the way of writing for Policies  --}}

<div>
    @can('create', \app\models\Task::class)
    <a href="{{ route('tasks.create')}}">add new task</a>
    @endcan
</div>


<td>
    @can('update', $task)
    <a href="{{ route('tasks.edit', $task)}}"> edit</a>
    @endcan


    @can('delete', $task)

    <form action="{{route('tasks.destroy', $task)}}"  method="post"  >
    
        @csrf
        @method('delete')
           <button>delete</button>
       
       </form>      
    @endcan
</td>
